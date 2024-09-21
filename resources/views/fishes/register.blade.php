@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create fish</div>
                <div class="card-body">

                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif


                    <form method="POST" action="{{ route('fishes.create') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control mb-2" placeholder="Enter name" name="name"
                                value="{{ old('name') }}" required pattern="[A-Za-z\s]+" title="Name should only contain letters and spaces."/>
                        </div>
                        <div class="form-group">
                            <label for="species">Species</label>
                            <select id="species" class="form-control mb-2" name="species" required>
                                <option value="Sapo Perro" {{ old('species') == 'Sapo Perro' ? 'selected' : '' }}>Sapo Perro</option>
                                <option value="Cabezón" {{ old('species') == 'Cabezón' ? 'selected' : '' }}>Cabezón</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="weight">Weight</label>
                            <input type="text" id="weight" class="form-control mb-2" placeholder="Enter weight" name="weight"
                                value="{{ old('weight') }}" required pattern="\d+(\.\d{1,2})?" title="Weight should be a number with up to two decimal places."/>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection