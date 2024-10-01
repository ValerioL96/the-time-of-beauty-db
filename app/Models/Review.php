<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['service_id', 'customer_name', 'rating', 'comment'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

