@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')


<div class="text-info text-center">
    @if (isset($viewData["message"]) && $viewData["message"])
        <h2>{{ $viewData["message"] }}</h2>
    @endif
</div>


<div class="container">
    <div class="row">
        @foreach($viewData['fishes'] as $fish)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfHlcmASZgNOAA0mtIwob78oSLwGP1PybjDQ&s" class="card-img-top" alt="Fish image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $fish->getId() }}</h5>
                        <h5 class="card-title">{{ $fish->getName() }}</h5>

                        <p class="card-text"><b>Species:</b> {{ $fish->getSpecies() }}</p>
                                

                        <div class="row">
                            <div class="col">
                                @if ($fish->getSpecies() == 'Sapo Perro')
                                    <p class="card-text"><b>Weight:</b> <b class="text-info">{{ $fish->getWeight() }} kg</b></p>
                                @else
                                    <p class="card-text text-dark"><b>Weight: {{ $fish->getWeight() }} kg</b></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
