<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // public function __construct(User $User)
    // {
    //     $this->User = $User;
    // }
    // public function index()
    // {
    //     $data = $this->User->all();
    //     $data = $this->User->orderby('id')->paginate(10);
    //     return view('customer.index', compact('data'));
    // }
    // public function create()
    // {
    //     return view('customer.create');
    // }
    // public function store(Request $request){
    //     $data = $request->except('_token');
    //     $user=new User();
    //     $user->name = $request->name;
    //     $user->contact = $request->contact;
    //     $user->address = $request->address;
    //     $user->email = $request->email;
    //     $user->citizenship = $request->citizenship;
    //     $user->password = $request->password;
    //     $user->status = $request->status;
    //     $user->save();
    //     return redirect()->back()->with('success', 'Successfully created a user.');
    // }
    // public function edit($id)
    // {
    //     $data = $this->User->findOrFail($id);   
    //     return view('customer.edit', compact('data'));
    // }
    // public function update(Request $request, $id){
    //     $data = $request->except('_method', '_token');
    //     $this->User->where('id', "$id")->update($data);
    //     return redirect()->back()->with('success', 'User detail updated successfully.');
    // }
    // public function destroy(Request $request, $id){
    //     $data = $request->except('_method', '_token');
    //     $this->User->where('id', "$id")->delete($data);
    //     return redirect()->back()->with('success', 'User data deleted successfully.');
    // }
}
