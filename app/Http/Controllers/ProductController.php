<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function listProducts(Request $request)
    {
        $products=Product::get();
        return Inertia::render('products',compact('products'));
    }
}
