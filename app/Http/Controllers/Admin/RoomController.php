<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRoomRequest;
use App\Http\Requests\Admin\UpdateRoomRequest;
use File;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms=Room::paginate(10);
        return view('admin.room.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
        // dd($request);
        $input=$request->all();
        $input['image']=$this->fileUpload($request,'image');
        $input['slug']=Str::slug($request->type);
        // dd($input);
        Room::create($input);
        return redirect()->route('admin.rooms.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('admin.room.edit',compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $old_image=$room->image;
        // dd($old_image);
        $input=$request->all();
        $image=$this->fileUpload($request,'image');
        if($image){
            $this->fileRemove($old_image);
            $input['image']=$image;
        }else{
            unset($input['image']);
        }
        $input['slug']=Str::slug($request->type);
        $room->update($input);
        return redirect()->route('admin.rooms.index')->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        $this->fileRemove($room->image);
        return redirect()->route('admin.rooms.index')->with('message', 'Delete Successfully');
    }
    public function fileUpload($request,$name)
    {
        $imageName='';
        if($image=$request->file($name)){
            $path=public_path().'/admin/assets/img/room';
            $imageName= date('YmdHis') . $name . "-" . $image->getClientOriginalName();
            $image->move($path,$imageName);
            $image=$imageName;
        }
        return $imageName;
    }
    
      public function fileRemove($image){
        $path=public_path().'/admin/assets/img/room/'.$image;
        // dd($path);
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}