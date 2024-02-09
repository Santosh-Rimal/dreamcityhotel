<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReservationRequest;
use App\Http\Requests\Admin\UpdateReservationRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::paginate(10);
        $types=Room::paginate(10);
        foreach ($reservations as $key => $reservation) {
            foreach ($types as $key => $type) {
               if($reservation->type==$type->id){
                $reservation['roomtype']=$type->type;
               }
            }
        }
        return view('admin.reservation.index',compact('reservations','types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomdetails = Room::get();
        // $roomdetails = Room::where('status', 'open')->get(['type', 'id','name']);
        // dd($types);
        return view('admin.reservation.create',compact('roomdetails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $request)
    {
       Reservation::create($request->all());
       return redirect()->route('admin.reservations.index')->with('message', 'Created Successfully'); 
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
    public function edit(Reservation $reservation)
    {
        // dd($reservation->type);
        $types=Room::get();
            foreach ($types as $key => $type) {
                // echo($type->id);
               if($reservation->type==$type->id){
                $reservation['roomtype']=$type->type;
               }else{
                $reservation['roomtypes']=$type->type;
                $reservation['types']=$type->id;
               }
        }
        return view('admin.reservation.edit',compact('reservation','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        // dd($request);
        $input=$request->all();
        $reservation->update($input);
        return redirect()->route('admin.reservations.index')->with('message', 'Update Successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('admin.reservations.index')->with('message', 'Delete Successfully');
    }
}