<?php

namespace App\Http\Controllers;

use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return Appointment::all();
        $appointments = Appointment::all();
        return AppointmentResource::collection($appointments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'department' => 'required|string|max:255',
            'room' => 'required|max:11',
            'date' => 'required',
            //'user_id' => 'required',
            'doctor_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $appointment = Appointment::create([
            'department' => $request->department,
            'room' => $request->room,
            'date' => $request->date,
            'user_id' => Auth::user()->id,
            'doctor_id' => $request->doctor_id,
        ]);

        return response()->json(['Post created successfully', new AppointmentResource($appointment)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
        // $appointment = Appointment::find($id);
        // if(is_null($appointment)){
        //     return response()->json('Data not found',404);
        // }
        // return response()->json($appointment);
        return new AppointmentResource($appointment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        
        // $validator = Validator::make($request->all(),[
        //     'department' => 'required|string|max:255',
        //     'room' => 'required|max:11',
        //     'date' => 'required',
        //     // 'user_id' => 'required',
        //     'doctor_id' => 'required',
        // ]);

        // if($validator->fails()){
        //     return response()->json($validator->errors());
        // }


    //     $appointment->department = $request->department;
    //     $appointment->room = $request->room;
    //     $appointment->date = $request->date;
    //     $appointment->user_id = $request->;
    //     $appointment->doctor_id = $request->doctor_id;


    //     $appointment->save();
    //     return response()->json(['Post updated successfully', new AppointmentResource($appointment)]);
    
        if(!is_null($request->department)){
            $appointment->department = $request->department;
       
        }    
        
        if(!is_null($request->room)) 
        $appointment->room = $request->room;
        if(!is_null($request->date)) 
        $appointment->date = $request->date;
        if(!is_null($request->doctor_id)) 
        $appointment->doctor_id = $request->doctor_id;
        $appointment->save();

        return response()->json(['Appointment updated successfully.', new AppointmentResource($appointment)]);


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
        $appointment->delete();
        return response()->json('Post deleted successfully.');
    }
}
