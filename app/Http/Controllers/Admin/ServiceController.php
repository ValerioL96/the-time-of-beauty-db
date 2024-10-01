<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::paginate(10);

        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Service $service)
    {
        return view('admin.service.create', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $data = $request->except('_token');
        $data = $request->validated();
        $newService = new Service($data);
        $newService->save();

        return redirect()->route('admin.service.show', $newService)->with('new_service_message', $newService->name . " It was created successfully!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('admin.service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data = $request->except('_token');
        $data = $request->validated();
        $service->update($data);

        return redirect()->route('admin.service.show', $service)->with('update_service_message', $service->name . " It has been successfully updated!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.service.index')->with('message_delete', $service->name . " it has been successfully deleted!!");
    }

    /**
     * Trash
     */

    public function deletedIndex()
    {
        $services = Service::onlyTrashed()->get();

        return view('admin.service.delete', compact('services'));
    }

    /* restore items from the recycle bin */
    public function restore(string $id)
    {
        $services = Service::onlyTrashed()->findOrFail($id);
        $services->restore();

        return redirect()->route('admin.service.index')->with('message_restore', $services->name . " it has been successfully restored!!");
    }

    /* Empty the trash */
    public function delete(string $id)
    {
        $services = Service::onlyTrashed()->findOrFail($id);
        $services->forceDelete();
        return redirect()->route('admin.service.deleteindex')->with('message_delete', $services->name . " The trash has been emptied!!");
    }
}
