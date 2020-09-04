<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {

    public function __invoke(Request $request, Category $category) {
        return view('category.info', compact('category'));
    }

}
