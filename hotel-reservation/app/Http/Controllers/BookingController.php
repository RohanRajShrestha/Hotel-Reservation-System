<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Customer;
Use \Carbon\Carbon;
use App\Models\Room;
use App\Models\Payment; 
use App\Models\Roomtype;


use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct(Booking $Booking, Room $Room)
    {
        $this->Booking = $Booking;
        $this->Room = $Room;
    }
    public function index(Request $request)
    {
        //for sorting the booking index page
        if ($request->has('form1')){
            $sort = $request->sortby;
            $data = $this->Booking->all();
            $data = $this->Booking->orderby($sort)->paginate(10);
            return view('booking.index', compact('data'));
        }
        if ($request->has('form2')){
            $sort = $request->sortby;
            $data = $this->Booking->where($request->findby, $request->value);
            return view('booking.index', compact('data'));
        }
        
        $data = $this->Booking->all();
        $data = $this->Booking->orderby('id')->paginate(10);
        return view('booking.index', compact('data'));
    }
    public function create(Request $request)
    {
        //to send the room and customer foreign key value in booking page
        $rooms = Room::all();
        if ($request->has('contact')) {
            $customers = Customer::where('contact', '=', $request->contact)->where('email', '=' ,$request->email)->first();//finds out the customer id
            if($customers == null){
                return redirect()->back()->with('error', 'The data was incorrect.')->with('rooms', $rooms);
            }
            $customer = $customers->id;
            return view('booking.create')->with('customer', $customer)->with('rooms', $rooms);//sends customer id in form and room id 
        }
        return view('booking.create')->with('rooms', $rooms);
    }
    
    public function store(Request $request)
    {
       
        //to prevent from past date reservations
        $date = Carbon::now();
        $checkin = $request->checkin;
        if($checkin >= $date){
            $roomstatus = Room::FindOrFail($request->room_id);//checking if the room is available for use
            if($roomstatus->status == 0){
                return redirect()->back()->with('error', 'The room is under maintenance.');
            }
            //checks if the room is prebooked for the day
            $prebooked = DB::select("SELECT * FROM bookings WHERE ('$checkin' BETWEEN checkin AND checkout) AND (room_status='processing' OR room_status='checkedin')AND room_id = $request->room_id");
            if($prebooked){
                //sends other available rooms
                $arooms= DB::SELECT("SELECT * FROM rooms WHERE id NOT IN(SELECT room_id FROM bookings WHERE '$checkin' BETWEEN checkin AND checkout)");
                return redirect()->back()->with('error', 'The room is booked for that day.');
            }
            $roomtype = Room::where('id', $request->room_id)->first();    

            if ($request->number_adults > $roomtype->Roomtype->number_adults) {
                return redirect()->back()->with('error', 'The number of adult is more than expected.'. ' '. $roomtype->number_adults . ' ' . 'Max adults for this room.');
            }
            $customer = Customer::find($request->user_id);
            if($customer == null){
                return redirect()->back()->with('error', 'No user found');
            }
            //saves the information for booking
            $booking =new Booking();
            $booking->room_id = $request->room_id;
            $booking->user_id = $request->user_id;
            $booking->checkin = $request->checkin;
            $booking->checkout = $request->checkout;
            $booking->number_adults = $request->number_adults;
            $booking->room_status = $request->room_status;
            $booking->status = $request->status;
            $booking->save();
            $bookid = $booking->id;
            //changes status of customer to booked
            $details = Room::findOrFail($request->room_id);
            $price = $details->Roomtype->price;
           
            $payment = new Payment();
            $payment->booking_id =$bookid;
            $payment->paymenttype = 'cash';
            $payment->price = $price;
            $payment->status = 'notpaid';
            $payment->save();
            return redirect()->back()->with('success', 'Booking detail created successfully.');
        }
        else{
            return redirect()->back()->with('error', 'Sorry cannot just go in past to book a room.');
        }
          
    }
    public function edit($id)
    {
        //for edit
        $data = $this->Booking->findOrFail($id); 
        return view('booking.edit', compact('data'));
    }
    public function update(Request $request, $id){
        //for update
        $data = $request->except('_method', '_token');
        if($request->room_status == 'checkedout'){
            $payment = Payment::where('booking_id', $id)->first();
            if($payment->status == 'notpaid'){
                return redirect()->back()->with('error', 'Payment has not been made.');
            }
            else{
                $this->Booking->where('id', "$id")->update($data);
                return redirect()->back()->with('success', 'Booking detail updated successfully.');
            }

        }
        elseif($request->room_status == 'cancelled'){
            $payment = Payment::where('booking_id', $id)->first();
            if($payment->status == 'paid'){
                if (date('Y-m-d') == $request->checkin){
                    $this->Booking->where('id', "$id")->update($data);
                    $payment->price = '100';
                    $payment->update();
                    return redirect()->back()->with('error', 'Payment has been made for cancellation deducted 100 as a charge.');
                }
                elseif(date('Y-m-d')> $request->checkin){
                    $this->Booking->where('id', "$id")->update($data);
                    $payment->price = '000';
                    $payment->update();
                    return redirect()->back()->with('error', 'Payment has been made for cancellation deducted 100 as a charge.');
                }
                else{
                    $this->Booking->where('id', "$id")->update($data);
                    $payment->price = '0';
                    $payment->update();
                    return redirect()->back()->with('success', 'Booking cancelled without any charges successfully.');
                }
                
            }
            else{
                //this assumes the customer pays 100 as a charge to employee
                if (date('Y-m-d') == $request->checkin){
                    $this->Booking->where('id', "$id")->update($data);
                    $payment->price = '100';
                    $payment->stauts = 'paid';
                    $payment->update();
                    
                    return redirect()->back()->with('error', 'Payment has not been made for cancellation deduct 100 as a charge.');
                }
                elseif(date('Y-m-d')> $request->checkin){
                    $this->Booking->where('id', "$id")->update($data);
                    $payment->price = '100';
                    $payment->stauts = 'paid';
                    $payment->update();
                    return redirect()->back()->with('error', 'Payment has not been made for cancellation deduct 100 as a charge.');
                }
                else{
                    $this->Booking->where('id', "$id")->update($data);
                    $payment->price = '0';
                    $payment->status = 'paid';
                    $payment->update();
                    return redirect()->back()->with('success', 'Booking cancelled without charges successfully.');
                }
                
            }
        }
        $this->Booking->where('id', "$id")->update($data);
        return redirect()->back()->with('success', 'Booking detail updated successfully.');
    }
    public function destroy(Request $request, $id){
        //for delete
        $data = $request->except('_method', '_token');
        $this->Booking->where('id', "$id")->delete($data);
        return redirect()->back()->with('success', 'Booking data deleted successfully.');

    }
    function result(Request $request){
        $validate = $request->validate([
            'checkin' => 'required',
            'checkout' => 'required'
        ]);
        $checkin = $request->checkin;
        $location = $request->location;
        
        $arooms= DB::SELECT("SELECT room_type_id, COUNT(room_type_id) as occurance FROM rooms WHERE (id NOT IN(SELECT room_id FROM bookings WHERE '$checkin' BETWEEN checkin AND checkout)) AND status = 1 GROUP BY room_type_id");  
        $roomtypes = array();
        $roomnumber = array();
        foreach ($arooms as $aroom) {
            
             $roomtypes[] = DB::SELECT("SELECT * from room_types where id = '$aroom->room_type_id' AND is_available = 1 AND location ='$location'");
            
            // DB::table('room_types')
            //     ->select('room_types.id','room_name', 'room_image', 'price', 'location', 'rooms.room_number', 'rooms.description')
            //     ->join('rooms', 'rooms.room_type_id', '=', 'room_types.id')
            //     ->where('room_types.id', $aroom->room_type_id)
            //     ->where('location', $location)
            //     ->where('is_available', 1)
            //     ->get();
            //  = DB::select("SELECT * from room_types where id = '$aroom->room_type_id' AND is_available = 1 ");
        }
        return view('frontend.results', compact(['roomtypes', 'roomnumber']))->with('success', 'Rooms Available on that date');
    }
    function booking($room_number){
        $data = Room::where('room_number', "$room_number")->get();
        return view('frontend.book', compact('data'));
        
    }
    function arooms($checkin_date){
        $arooms= DB::SELECT("SELECT * FROM rooms WHERE (id NOT IN(SELECT room_id FROM bookings WHERE ('$checkin_date' BETWEEN checkin AND checkout) AND (room_status = 'processing' OR room_status = 'checkedin'))) AND status = 1");
        return response()->json(['data'=>$arooms]);
    }
    function availablerooms(Request $request, $checkin_date, $id){
        $arooms= DB::SELECT("SELECT * FROM rooms WHERE (id NOT IN(SELECT room_id FROM bookings WHERE ('$checkin_date' BETWEEN checkin AND checkout) AND (room_status = 'processing' OR room_status = 'checkedin'))) AND status = 1 AND room_type_id = $id");
        return response()->json(['data'=>$arooms]);
    }
}