<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::all(); // Recupera tutti gli appuntamenti
        return view('admin.appointment.index', compact('appointments')); // Passa gli appuntamenti alla vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.appointment.create'); // Ritorna la vista per creare un nuovo appuntamento
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:15',
            'customer_email' => 'nullable|email|max:255',
            'appointment_time' => 'required|date',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        Appointment::create($request->all()); // Crea un nuovo appuntamento

        return redirect()->route('admin.appointment.index')->with('success', 'Appuntamento creato con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        return view('admin.appointment.show', compact('appointment')); // Ritorna la vista per visualizzare un appuntamento specifico
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        return view('admin.appointment.edit', compact('appointment')); // Ritorna la vista per modificare un appuntamento
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:15',
            'customer_email' => 'nullable|email|max:255',
            'appointment_time' => 'required|date',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $appointment->update($request->all()); // Aggiorna l'appuntamento esistente

        return redirect()->route('admin.appointment.index')->with('success', 'Appuntamento aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete(); // Elimina l'appuntamento

        return redirect()->route('admin.appointment.index')->with('success', 'Appuntamento eliminato con successo.');
    }
}

