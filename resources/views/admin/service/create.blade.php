@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <form action="{{ route('admin.service.store', $service )}}" method="POST" id="creation-form">
                @method("POST")
                @csrf

                <div class="input-group-sm container mb-5 w-50">
                    <label for="name"><strong>Nome</strong></label>
                    <input type="text" class="form-control mb-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="service Nome" id="name" name="name" value="{{ old('name', $service->name) }}">

                    <label for="description"><strong>Descrizione</strong></label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Descrizione" id="description" name="description" value="{{ old('description', $service->description) }}">

                    <label for="price"><strong>Prezzo</strong></label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Prezzo" id="price" name="price" value="{{ old('price', $service->price) }}">

                    <label for="duration"><strong>Durata</strong></label>
                    <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Durata" id="duration" name="duration" value="{{ old('duration', $service->duration) }}">
                </div>
                <div class="col-12 d-flex justify-content-center mb-3">
                    <div class="input">
                        <button class="btn btn-success" type="submit">
                            <i class="fa-solid fa-plus"></i>
                        </button>

                        <button class="btn btn-secondary mx-2" type="reset">
                            <i class="fa-solid fa-arrow-rotate-right"></i>
                        </button>
                    </div>
                    <a href="{{route('admin.service.index', $service) }}" class="btn btn-primary ms-1 "><i class="fa-solid fa-eye-slash"></i></a>
                </div>
            </form>

        </div>

    </div>
</div>
@endsection

@section('custom_script')
@vite('resources/js/service/edit-confirmation.js')
@endsection
