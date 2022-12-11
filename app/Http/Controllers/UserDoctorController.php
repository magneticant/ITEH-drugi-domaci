<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class UserDoctorController extends Controller
{
    //
    public function index($user_id)
    {
        # code...
        $appointments = Appointment::get()->where('user_id', $user_id);
        if(is_null($appointments)){
            return response()->json('Data not found',404);
        }
        $doctor_id = $appointments[0]->doctor_id;
        $doctor = Doctor::get()->where('id', $doctor_id);

        return response()->json($doctor);
    }
}
