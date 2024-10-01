@extends('layouts.app')

@section('content')
<section class="container">
    <div class="row justify-content-center">
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

                {{-- card footer con bottoni torna a servizi, edit e elimina --}}

                <div class="card-footer card-link d-flex justify-content-center ">
                    <a href="{{route('admin.service.index', $service) }}" class="btn btn-primary mx-2"><i class="fa-solid fa-eye-slash"></i></a>
                    <a href="{{ route('admin.service.edit', $service )}}" class="btn btn-warning mx-2"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form  action="{{ route('admin.service.destroy', $service) }}" method="POST" class="d-inline-block delete-form mx-2" data_service_id="{{ $service->id }}" data_service_name="{{ $service->name }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can-arrow-up"></i></button>
                    </form>
                </div>
            </div>
        </article>
    </div>
</section>
@endsection

@section('custom_script')
@vite('resources/js/service/delete-confirmation.js')
@endsection
