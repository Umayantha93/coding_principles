<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    #controller designed using SOLID principle
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        return $this->productService->getAllProducts();
    }

    public function store(ProductRequest $request)
    {
        $product =  $this->productService->createProduct($request->validated());
        return response()->json($product, 200);
    }

    public function show($id)
    {
        $product = $this->productService->getProductById($id);
        return response()->json($product, 200);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = $this->productService->updateProduct($request->validated(), $id);
        return response()->json($product, 200);
    }

    public function destroy($id)
    {
        $product = $this->productService->deleteProduct($id);
        return response()->json(null, 200);
    }
}
