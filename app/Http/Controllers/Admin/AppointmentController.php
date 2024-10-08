<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Twilio\Rest\Client as RestClient;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:15',
            'customer_email' => 'nullable|email|max:255',
            'appointment_time' => 'required|date',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'services' => 'required|array', // ID dei servizi selezionati
        ]);

        // Crea l'appuntamento e associa i servizi
        $appointment = Appointment::create($request->only(['customer_name', 'customer_phone', 'customer_email', 'appointment_time', 'status']));
        $appointment->services()->sync($request->services);

        // Invio messaggio WhatsApp al barbiere
        $this->sendWhatsAppNotification($appointment);

        // Salvataggio confermato e invio della risposta
        return response()->json(['success' => 'Appuntamento creato e messaggio inviato con successo.'], 200);
    }

    protected function sendWhatsAppNotification(Appointment $appointment)
    {
        $barberPhone = 'whatsapp:3473443637'; // Il numero WhatsApp del barbiere

        $client = new RestClient(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));

        $message = "Nuova prenotazione ricevuta:\n".
                    "Nome cliente: {$appointment->customer_name}\n".
                    "Telefono: {$appointment->customer_phone}\n".
                    "Data e ora: {$appointment->appointment_time}\n".
                    "Servizi: " . $appointment->services->pluck('name')->implode(', ');

        // Invia il messaggio su WhatsApp
        $client->messages->create($barberPhone, [
            'from' => env('TWILIO_WHATSAPP_FROM'),
            'body' => $message,
        ]);
    }

    public function update(Request $request, Appointment $appointment)
{
    $request->validate([
        'customer_name' => 'required|string|max:255',
        'customer_phone' => 'required|string|max:15',
        'customer_email' => 'nullable|email|max:255',
        'appointment_time' => 'required|date',
        'status' => 'required|in:pending,confirmed,completed,cancelled',
    ]);

    $appointment->update($request->all());

    // Se l'appuntamento è completato, invia messaggio al cliente
    if ($appointment->status === 'completed') {
        $this->sendReviewRequest($appointment);
    }

    return redirect()->route('admin.appointments.index')->with('success', 'Appuntamento aggiornato con successo.');
}

protected function sendReviewRequest(Appointment $appointment)
{
    $client = new RestClient(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));

    $message = "Grazie per aver scelto i nostri servizi! Lascia una recensione al seguente link: ".
                route('review.create', $appointment->id);

    // Invia il messaggio al cliente su WhatsApp
    $client->messages->create("whatsapp:{$appointment->customer_phone}", [
        'from' => env('TWILIO_WHATSAPP_FROM'),
        'body' => $message,
    ]);
}

}

