@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        <div class="col-12">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Durata</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($services as $service)

                    <tr>
                        <th>{{ $service->id }}</th>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->description }}</td>
                        <td>&euro; {{ $service->price }}</td>
                        <td>{{ $service->duration }} min</td>
                        <td>
                            <a href="{{ route('admin.service.show', $service )}}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.service.edit', $service )}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('admin.service.destroy', $service) }}" method="POST" class="d-inline-block delete-form " data_service_id="{{ $service->id }}" data_service_name="{{ $service->name }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can-arrow-up"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="pagination">
                    {{ $services->links(); }}
                </div>

        </div>

    </div>
</div>

@endsection

@section('custom_script')
@vite('resources/js/service/delete-confirmation.js')
@endsection
