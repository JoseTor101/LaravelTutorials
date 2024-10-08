<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {

        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        /*if (! isset(ProductController::$products[$id - 1])) {
            return redirect()->route('home.index');
        }*/

        $viewData = [];
        $product = Product::findOrfail($id);
        $viewData['title'] = $product['name'].' - Online Store';    
        $viewData['subtitle'] = $product['name'].' - Product information';
        $viewData['product'] = $product;
        
        return view('product.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData['title'] = 'Create product';

        return view('product.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|gt:0',
        ]);

        Product::create($request->only(['name', 'price']));

        return redirect()->route('product.index');

        /*$newId = count(ProductController::$products) + 1;

            $newProduct = [
                "id" => (string)$newId,
                "name" => $validatedData["name"],
                "price" => $validatedData["price"],
            ];

            ProductController::$products[] = $newProduct;

            return redirect()->route('product.success', [
                'id' => $newProduct["id"],
                'name' => $newProduct["name"],
                'price' => $newProduct["price"],
            ]);
        */
    }

    public function success(Request $request): View|RedirectResponse
    {
        $product = $request->only(['id', 'name', 'price']);

        if (empty($product['id']) || empty($product['name']) || empty($product['price'])) {
            Log::info('Product details missing in query parameters.');

            return redirect()->route('home.index');
        }

        $viewData = [];
        $viewData['title'] = 'Success - Online Store';
        $viewData['subtitle'] = 'Product successfully created!';
        $viewData['product'] = $product;

        return view('product.success')->with('viewData', $viewData);
    }

    
}
