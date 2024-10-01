<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return Service::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
        ]);

        $service = Service::create($request->all());

        return response()->json(['success' => 'Servizio creato con successo!', 'service' => $service], 201);
    }

    public function show(Service $service)
    {
        return response()->json($service);
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
        ]);

        $service->update($request->all());

        return response()->json(['success' => 'Servizio aggiornato con successo.']);
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json(['success' => 'Servizio eliminato con successo.']);
    }
}
