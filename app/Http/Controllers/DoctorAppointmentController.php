<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class DoctorAppointmentController extends Controller
{
    //
    public function index($doctor_id)
    {
        # code...
        $appointments = Appointment::get()->where('doctor_id', $doctor_id);
        if(is_null($appointments)){
            return response()->json('Data not found',404);
        }

        return response()->json($appointments);
    }
}
