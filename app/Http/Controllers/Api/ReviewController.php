<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return Review::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'customer_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        // Crea una nuova recensione
        $review = Review::create($request->all());

        return response()->json(['success' => 'Recensione creata con successo!', 'review' => $review], 201);
    }

    public function show(Review $review)
    {
        return response()->json($review); // Restituisce i dettagli di una recensione specifica
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review->update($request->all());

        return response()->json(['success' => 'Recensione aggiornata con successo.']);
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return response()->json(['success' => 'Recensione eliminata con successo.']);
    }
}

