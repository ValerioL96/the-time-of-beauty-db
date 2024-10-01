@extends('layouts.app')

@section('content')

<section class="container">

    <div class="row justify-content-center">

        {{-- Assicurati di avere una collezione di servizi e non un singolo servizio --}}
        @foreach($services as $service)
        <article class="col-3 my-4">

            <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">
                    <h2 class="card-title">
                        {{$service->id}}: {{$service->name}}
                    </h2>
                </div>

                <div class="card-body">
                    <h3 class="card-text">{{$service->description}}</h3>
                    <h3 class="card-text">&euro; {{ $service->price }}</h3>
                    <h3 class="card-text">{{ $service->duration }} min</h3>
                </div>

                {{-- Card footer con bottoni ripristina e elimina definitivamente --}}
                <div class="card-footer card-link d-flex justify-content-center ">
                    <form action="{{ route('admin.service.restore', $service) }}" method="POST" class="d-inline-block mx-2" data_service_id="{{ $service->id }}" data_service_nome="{{ $service->name }}">
                        @method('PATCH')
                        @csrf
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-reply"></i></button>
                    </form>

                    <form action="{{ route('admin.service.permanent_delete',  $service) }}" method="POST" class="d-inline-block delete-form" data_service_id="{{ $service->id }}" data_service_nome="{{ $service->name }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            </div>
        </article>
        @endforeach
    </div>
</section>

@endsection

