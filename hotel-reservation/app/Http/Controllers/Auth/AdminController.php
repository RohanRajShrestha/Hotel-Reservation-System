<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class AdminController extends Controller
{
    public function __construct(Admin $Admin)
    {
        $this->Admin = $Admin;
    }
    
    public function index()
    {
        
        $data = $this->Admin->all();
        $data = $this->Admin->orderby('id')->where('is_superadmin', 0)->paginate(10);
        return view('admin.index', compact('data'));
    }
    
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request){
        $data = $request->except('_token');
        $admin=new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password =Hash::make($request->password);
        $admin->status = $request->status;
        $admin->save();
        return redirect()->back()->with('success', 'Successfully created a Admin profile.');
    }
    public function edit($id)
    {
        $data = $this->Admin->findOrFail($id);   
        return view('admin.edit', compact('data'));
    }
    public function update(Request $request, $id){      
        if($request->password == null){
            $password = 'password';
            $data =[
                'name' => $request->name,
                'email' => $request->email,
                'is_superadmin' => $request->is_superadmin,
                'status'=>$request->status
            ];
            $this->Admin->where('id', "$id")->update($data);
            return redirect()->back()->with('success', 'Admin detail updated successfully.');
        }
        $data = $request->except('_method', '_token');
        $this->Admin->where('id', "$id")->update($data);

        return redirect()->back()->with('success', 'Admin detail updated successfully.');
    }
    public function destroy(Request $request, $id){
        $data = $request->except('_method', '_token');
        $this->Admin->where('id', "$id")->delete($data);
        return redirect()->back()->with('success', 'Admin data deleted successfully.');
    }
    public function login(){
        return view('admin.login');
    }
    public function check(Request $request){
        $validate = $request->except('_token');
        if(Auth::guard('admin')->attempt(['email' => $validate['email'], 'password' => $validate['password']])){
            $admin = Admin::where('email', $validate['email'])->first();
            if ($admin->status == "1" ) {
                return redirect()->route('admin.dashboard')->with('success', 'admin login successfylly');
            }
            return back()->with('error', 'The account has been deactivated. Try contacting the concerned department.');
                     
        }
        else{
            return back()->with('error', 'Invalid Email Or Password');
        }
    }
    public function dashboard(){
        $countbook = Booking::count();
        $countcustomer = Customer::count();
        $countrooms = Room::count();
        $countadmins = Admin::count();
        $revenue = Payment::where('status', 'paid')->sum('price');
        $data = Booking::whereIn('room_status', ['checkedin', 'checkedout'])->orderBy('updated_at', 'desc')->paginate(5);
        $missedbookings = Booking::where('checkin', '<', date('Y-m-d'))->where('room_status', 'processing')->paginate(5);
        return view('admin.dashboard', compact('countbook', 'countcustomer','countrooms', 'countadmins', 'data', 'missedbookings', 'revenue'));
    }

    public function perform()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('annapurnahotel/admin/login');
    }
    public function profile($id){
        $data = Admin::findOrFail($id);
        return view('admin.profile', compact('data'));
    }
    public function changepassword($id){
        $data = $this->Admin->findOrFail($id);   
        return view('admin.changepassword', compact('data'));
    }
    public function change(Request $request, $id){
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);
        if (!(Hash::check($request->get('current-password'), Auth::guard('admin')->user()->password))) {
            return redirect()->back()->with("error","Your current password does not match the previous password.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }
        if($request->get('new-password_confirmation') == $request->get('new-password')){
            $data = Admin::find($id);

            // Make sure you've got the Page model
            if($data) {
                $data->password = Hash::make($request->get('new-password_confirmation'));
                $data->save();
            }
            return redirect()->back()->with("success","Password successfully changed!");
        }
        return redirect()->back()->with("error","New Password and new password confirm not same.");
        
        
    }
}
