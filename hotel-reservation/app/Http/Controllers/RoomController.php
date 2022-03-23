<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct(Room $Room)
    {
        $this->Room = $Room;
    }
    public function index()
    {
        $data = $this->Room->all();
        $data = $this->Room->orderby('id')->paginate(10);
        return view('room.index', compact('data'));
    }
    public function create()
    {
        $roomtypes = RoomType::all();
        return view('room.create')->with('roomtypes', $roomtypes);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'room_type_id' => ['required', 'max:255'],
            'room_number' => ['required', 'unique:rooms,room_number'],
            'description' => ['required', 'max:255'],
            'status' => ['required']
        ]);
        $data = $request->except('_token');
        $room=new Room();
        $room->room_type_id = $request->room_type_id;
        $room->room_number = $request->room_number;
        $room->description = $request->description;
        $room->status = $request->status;
        $room->save();
        return redirect()->back()->with('success', 'Successfully created a room.');
    }
    public function edit($id)
    {
        $data = $this->Room->findOrFail($id);   
        return view('room.edit', compact('data'));
    }
    public function update(Request $request, $id){
        $data = $request->except('_method', '_token');
        $this->Room->where('id', "$id")->update($data);
        return redirect()->back()->with('success', 'Room detail updated successfully.');
    }
    public function destroy(Request $request, $id){
        $data = $request->except('_method', '_token');
        $this->Room->where('id', "$id")->delete($data);
        return redirect()->back()->with('success', 'Room data deleted successfully.');
    }

    

}
