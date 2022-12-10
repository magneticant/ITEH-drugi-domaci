<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'room',
        'date',
        'doctor_id',
        'user_id'
    ];

    public function doctor()
    {
        # code...
        return $this->belongsTo(Doctor::class);
    }
    
    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }
}
