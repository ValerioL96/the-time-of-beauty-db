<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'duration'
    ];

    // Relazione molti-a-molti con appuntamenti

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'appointment_service');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
