@extends('layouts.app')

@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Create a New Product</h1>
    <form action="{{ route('api.v3.product.store') }}" method="POST" id="productForm">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product Name:</label>
            <input type="text" id="name" name="name" required class="form-control" placeholder="Enter product name">
        </div>
        
        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="number" id="price" name="price" required step="0.01" class="form-control" placeholder="Enter price">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
