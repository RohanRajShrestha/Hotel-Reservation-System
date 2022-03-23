<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Booking;
Use \Carbon\Carbon;
use App\Models\RoomType;
use App\Models\Payment;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function __construct(Customer $Customer)
    {
        $this->Customer = $Customer;
    }
    
    public function index()
    {
        $data = $this->Customer->all();
        $data = $this->Customer->orderby('id')->paginate(10);
        return view('customer.index', compact('data'));
    }
    
    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request){
        $data = $request->except('_token');
        $customer=new Customer();
        $customer->name = $request->name;
        $customer->contact = $request->contact;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->citizenship = $request->citizenship;
        $customer->password = Hash::make($request->password);
        $customer->status = $request->status;
        $customer->save();
        return redirect()->back()->with('success', 'Successfully created a customer profile.');
    }

    public function userstore(Request $request){
        $data = $request->except('_token');
        $customer=new Customer();
        $customer->name = $request->name;
        $customer->contact = $request->contact;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->citizenship = $request->citizenship;
        $customer->password = Hash::make($request->password);
        $customer->status = 0;
        $customer->save();
        return redirect('/login')->with('success', 'Registered Successfully.');
    }
    public function edit($id)
    {
        $data = $this->Customer->findOrFail($id);   
        return view('customer.edit', compact('data'));
    }
    public function update(Request $request, $id){
        $data = $request->except('_method', '_token');
        $this->Customer->where('id', "$id")->update($data);
        return redirect()->back()->with('success', 'Customer detail updated successfully.');
    }
    public function destroy(Request $request, $id){
        $data = $request->except('_method', '_token');
        $this->Customer->where('id', "$id")->delete($data);
        return redirect()->back()->with('success', 'Customer data deleted successfully.');
    }
    public function show($id){
        // $rooms = DB::select('SELECT room_id, count(room_id) as occur FROM bookings orderBy('room_id')');
        $rooms =  DB::table('bookings')->select('room_id', DB::raw('COUNT(room_id) AS occurrences'))
        ->where('status', 1)
        ->groupBy('room_id')
        ->orderBy('occurrences', 'DESC')
        ->limit(10)
        ->get();
        $roomtypes = array();

        if(!empty($rooms)){
            foreach ($rooms as $room) {
                $roomtypes[] = DB::select("select * from room_types where id = '$room->room_id'");
            }
        }
        
        $data = Customer::findOrFail($id);

        $mybookings = Booking::where('user_id', '=', $id)->whereIn('room_status',['processing', 'checkedin'])->paginate(15);
        $previousbookings = Booking::where('user_id', '=', $id)->whereIn('room_status',['checkedout', 'cancelled'])->paginate(15);
        
        
        return view('user.profile', compact('data', 'roomtypes', 'mybookings', 'previousbookings'));
        
    }
    public function login(){
        return view('user.login');
    }
    public function checklogin(Request $request){
        $validate = $request->all();
        if(Auth::guard('customer')->attempt(['email' => $validate['email'], 'password' => $validate['password']])){
    
            return redirect()->route('frontend.home')->with('success', 'Thank you for logging on our website');         
        }
        else{
            return back()->with('error', 'Invalid Email Or Password');
        }
    }
    public function register(){
        return view('user.register');
    }

    public function perform()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('/home');
    }
    public function booking(){
        $rooms = RoomType::where('is_available', '=', 1)->orderby('id')->paginate(8);
        return view('frontend.booking', compact('rooms'));
    }
    public function editprofile($id)
    {
        $data = $this->Customer->findOrFail($id);   
        return view('user.edit', compact('data'));
    }
    public function changepassword($id){
        $data = $this->Customer->findOrFail($id);   
        return view('user.changepassword', compact('data'));
    }
    public function change(Request $request, $id){
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);
        if (!(Hash::check($request->get('current-password'), Auth::guard('customer')->user()->password))) {
            return redirect()->back()->with("error","Your current password does not match the previous password.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }
        if($request->get('new-password_confirmation') == $request->get('new-password')){
            $data = Customer::find($id);

            // Make sure you've got the Page model
            if($data) {
                $data->password = Hash::make($request->get('new-password_confirmation'));
                $data->save();
            }
            return redirect()->back()->with("success","Password successfully changed!");
        }
        return redirect()->back()->with("error","New Password and new password confirm not same.");
        
        
    }
    public function roombook($id){
        $roomtype = RoomType::findOrFail($id);
        return view('frontend.book', compact('roomtype'));
    }
    public function bookstore(Request $request)
    {
        $date = date('Y-m-d');
        $checkin = $request->checkin;
        if($checkin >= $date){
        $validated = $request->validate([
            'room_id' => 'required',
            'user_id' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
            'number_adults' => 'required'
        ]);   
        
            //saves the information for booking
            $booking =new Booking();
            $booking->room_id = $request->room_id;
            $booking->user_id = $request->user_id;
            $booking->checkin = $request->checkin;
            $booking->checkout = $request->checkout;
            $booking->number_adults = $request->number_adults;
            $booking->status = 1;
            $booking->save();
            $bookid = $booking->id;
            //making sure even if client disconnets after booking payment get stored
            $payment = new Payment();
            $payment->booking_id =$bookid;
            $payment->paymenttype = 'card';
            $payment->price = $request->price;
            $payment->status = 'notpaid';
            $payment->save();
            return view('frontend.payment',compact('bookid'))->with('success', 'Booking detail created successfully.');
        }
        else{
            return redirect()->back()->with('error', 'The date was set of a past time.');
        }
    }
    public function pay($bookid){
        return view('frontend.payment', compact('bookid'));
    }
    public function paymentstore(Request $request){
        $data = Payment::where('booking_id', '=', $request->form1)->first();
            if ($request->has('form1')) {
                $data->status = 'paid';
                $data->update();
                return redirect('/home')->with('success', 'Successfully made a payment.');

            }
            if ($request->has('form2')) {
                return redirect('/home');
            }
        }
        

    public function checkin($id){
        $bookingdetails = Booking::findOrFail($id);
        if (date('Y-m-d') == $bookingdetails->checkin) {
            $bookingdetails->room_status = 'checkedin';
            $bookingdetails->update();
            return 1;
        }
        elseif(date('Y-m-d') > $bookingdetails->checkin)
        {
            return 2;
        }
        else{
            return 3;
        }

    }
    public function checkout($id){
        $bookingdetails = Booking::findOrFail($id);
        if($bookingdetails->getPayments->status == 'paid'){
            if ($bookingdetails->room_status == 'checkedin') {
                $bookingdetails->room_status = 'checkedout';
                $bookingdetails->update();
                return 1;
            }
            elseif ($bookingdetails->room_status == 'processing'){
                return 2;
            }
            else{
                return 3;
            }
        }
        elseif($bookingdetails->getPayments->status == 'notpaid'){
            if ($bookingdetails->room_status == 'checkedin') {
                return 4;
            }
            else return 5;
        }
    }
    public function cancel($id){
        $bookingdetails = Booking::findOrFail($id);
        if (date('Y-m-d') > $bookingdetails->checkin) {
            $bookingdetails->room_status = 'cancelled';
            $bookingdetails->update();
            return 1;
        }
        elseif(date('Y-m-d') < $bookingdetails->checkin){
            $bookingdetails->room_status = 'cancelled';
            $bookingdetails->update();
            return 1;
        }
        else{
            return 2;
        }
    }
}
