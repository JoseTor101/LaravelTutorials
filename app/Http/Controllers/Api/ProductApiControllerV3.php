<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use GuzzleHttp\Client;

class ProductApiControllerV3 extends Controller
{
    public function index(): JsonResponse
    {
        $products = new ProductCollection(Product::all());
        return response()->json($products, 200);
    }

    public function paginate(): JsonResponse
    {
        $products = new ProductCollection(Product::paginate(5));
        return response()->json($products, 200);
    }


    public function create() : View
    {
        $viewData = [
            'title' => 'Create a New Product',
            'subtitle' => 'Fill in the details below to create a new product'
        ];

        return view('product-api.create', compact('viewData'));
    }

    public function store(Request $request) : JsonResponse
    {
    
        $product = new Product();
        $validatedData = $product->validate($request->all());
        $product = Product::create($validatedData);


        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product,
        ], 201);
    }

}

