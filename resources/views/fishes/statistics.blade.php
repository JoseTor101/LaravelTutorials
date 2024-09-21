@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
    <table class="table table-bordered">
        <h2>Statistics by specie: </h2>
        <thead>
            <tr>
                <th><h3>Species</h3></th>
                <th><h3>Count</h3></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><h5>Sapo perro</h5></td>
                <td>{{ $viewData['speciesFrogDog'] }}</td>
            </tr>
            <tr>
                <td><h5>Cabezón</h5></td>
                <td>{{ $viewData['speciesBigHead'] }}</td>
            </tr>
        </tbody>
    </table>
    
    <h4><b> Heavier fish: </b>  {{ $viewData['heavierFish'] }}</h4>
</div>
@endsection
