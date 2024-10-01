<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['customer_name', 'customer_phone', 'customer_email', 'appointment_time', 'status'];

    // Relazione molti-a-molti con servizi

    public function services()
    {
        return $this->belongsToMany(Service::class, 'appointment_service');
    }
}

