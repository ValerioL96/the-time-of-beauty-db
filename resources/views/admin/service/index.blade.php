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
                        {{-- <td>
                            <a href="{{ route('admin.project.show', $service )}}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('admin.project.edit', $service )}}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.project.destroy', $service) }}" method="POST" class="d-inline-block delete-form mx-2" data_project_id="{{ $service->id }}" data_project_name="{{ $service->name }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td> --}}
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
@vite('resources/js/project/delete-confirmation.js')
@endsection
