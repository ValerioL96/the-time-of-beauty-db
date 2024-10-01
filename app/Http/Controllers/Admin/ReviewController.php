<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Appointment;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create($appointmentId)
    {
        // Trova l'appuntamento e restituisci la vista per creare una recensione
        $appointment = Appointment::findOrFail($appointmentId);
        return view('reviews.create', compact('appointment'));
    }

    public function store(Request $request, $appointmentId)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        // Crea una nuova recensione associata all'appuntamento
        Review::create([
            'service_id' => $appointmentId,  // ID dell'appuntamento per collegare la recensione
            'customer_name' => $request->customer_name,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('reviews.thankyou')->with('success', 'Grazie per la tua recensione!');
    }
}

