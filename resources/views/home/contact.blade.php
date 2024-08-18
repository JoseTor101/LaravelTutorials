@extends('layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)
@section('content')
<div class="container">
    <div class="row text-center">
        <h2 class="text-center">Contact me!</h2>
        <div class="col-lg-4 ms-auto">
            <p class="lead">{{ $email }}</p>
        </div>
        <div class="col-lg-4 me-auto">
            <p class="lead">{{ $address }}</p>
        </div>
        <div class="col-lg-4 me-auto">
            <p class="lead">{{ $phoneNumber }}</p>
        </div>
    </div>
</div>
@endsection