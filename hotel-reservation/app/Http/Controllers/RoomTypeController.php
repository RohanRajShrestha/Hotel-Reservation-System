<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(RoomType $RoomType)
    {
        $this->RoomType = $RoomType;
    }
    public function index()
    {
        $data = $this->RoomType->all();
        $data = $this->RoomType->orderby('id')->paginate(10);
        return view('roomtype.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            $file = $request->file('file');
            $roomName = $request->get('room_name');
            $name = time() . '-' . $roomName. '.' .$file->extension();
            $path = $file->move(public_path('roomimg'), $name);
            $roomType = new RoomType([
                "room_name" =>$request->get('room_name'),
                "room_image" =>$name,
                "description" =>$request->get('description'),
                "price" =>$request->get('price'),
                "location" =>$request->get('location'),
                "number_adults"=>$request->get('number_adults'),
                "is_available" =>$request->get('is_available'),
                "status" =>$request->get('status')
            ]);
            $roomType->save();
    }
    return redirect()->back()->with('success', 'Successfully created a room type.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $roomType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->RoomType->findOrFail($id); 
        return view('roomtype.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $roomtype = RoomType::find($id);
        $name = $roomtype->room_image;
        if ($request->hasFile('file')) {
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            $destination = 'public/roomimg/'.$roomtype->room_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('file');
            $roomName = $request->get('room_name');
            $name = time() . '-' . $roomName. '.' .$file->extension();
            $path = $file->move(public_path('roomimg'), $name);
        }
        $data = [
            "room_name" =>$request->get('room_name'),
            "room_image" =>$name,
            "description" =>$request->get('description'),
            "price" =>$request->get('price'),
            "location" =>$request->get('location'),
            "number_adults"=>$request->get('number_adults'),
            "is_available" =>$request->get('is_available'),
            "status" =>$request->get('status')
        ];
        $this->RoomType->where('id', "$id")->update($data);
    
    return redirect()->back()->with('success', 'Successfully updated a room type.');
        
    }

    public function destroy(Request $request, $id)
    {
        $data = $request->except('_method', '_token');
        $this->RoomType->where('id', "$id")->delete($data);
        return redirect()->back()->with('success', 'A roomtype data deleted successfully.');
    }
    public function room(){
        
        $roomktm = $this->RoomType->where('location', '=', 'kathmandu')->orderby('id')->paginate(4);
        $roompkh = $this->RoomType->where('location', '=', 'pokhara')->orderby('id')->paginate(4);
        return view('frontend.home', compact( 'roomktm', 'roompkh'));
    }

    public function findroom(Request $request)
    {
        $data = $request->all();
        dd($data);
    }
}
