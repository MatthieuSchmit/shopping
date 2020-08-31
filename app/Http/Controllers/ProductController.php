<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {

    public function __invoke(Request $request, Product $product)
    {
        if($product->active || $request->user()->admin) {
            return view('product.info', compact('product'));
        }
        return redirect(route('home'));
    }

}
