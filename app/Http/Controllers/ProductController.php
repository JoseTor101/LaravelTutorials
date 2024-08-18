<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    public static $products = [
        ["id" => "1", "name" => "TV", "description" => "Best TV", "price" => "1000"],
        ["id" => "2", "name" => "iPhone", "description" => "Best iPhone", "price" => "800"],
        ["id" => "3", "name" => "Chromecast", "description" => "Best Chromecast", "price" => "50"],
        ["id" => "4", "name" => "Glasses", "description" => "Best Glasses", "price" => "100"],
    ];
    public function index(): View
    {

        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] = "List of products";
        $viewData["products"] = ProductController::$products;
        return view('product.index')->with("viewData", $viewData);
    }
    public function show(string $id): View | RedirectResponse
    {
        if (!isset(ProductController::$products[$id - 1])) {
            return redirect()->route('home.index');
        }

        $viewData = [];
        $product = ProductController::$products[$id - 1];
        $viewData["title"] = $product["name"] . " - Online Store";
        $viewData["subtitle"] = $product["name"] . " - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create product";

        return view('product.create')->with("viewData", $viewData);
    }

    public function save(Request $request): RedirectResponse
    {   
        $validatedData = $request->validate([
            "name" => "required",
            "price" => "required|numeric|gt:0",
        ]);

        $newId = count(ProductController::$products) + 1;

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
    }

    public function success(Request $request): View | RedirectResponse
    {   
        $product = $request->only(['id', 'name', 'price']);

        if (empty($product['id']) || empty($product['name']) || empty($product['price'])) {
            Log::info("Product details missing in query parameters.");
            return redirect()->route('home.index');
        }

        $viewData = [];
        $viewData["title"] = "Success - Online Store";
        $viewData["subtitle"] = "Product successfully created!";
        $viewData["product"] = $product;
        return view('product.success')->with("viewData", $viewData);
    }
}
