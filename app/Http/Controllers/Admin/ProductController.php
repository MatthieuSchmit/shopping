<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as InterventionImage;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsDataTable $dataTable) {
        return $dataTable->render('admin.shared.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.products.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request) {
        $inputs = $this->getInputs($request);
        Product::create($inputs);
        return back()->with('alert', config('messages.productcreated'));
    }

    protected function saveImages($request) {
        $image = $request->file('image');
        $name = time() . '.' . $image->extension();
        $img = InterventionImage::make($image->path());
        $img->widen(800)->encode()->save(public_path('/images/') . $name);
        $img->widen(400)->encode()->save(public_path('/images/thumbs/') . $name);
        return $name;
    }
    protected function getInputs($request) {
        $inputs = $request->except(['image']);
        $inputs['active'] = $request->has('active');
        $inputs['star'] = $request->has('star');
        if($request->image) {
            $inputs['image'] = $this->saveImages($request);
        }
        return $inputs;
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product) {
        return view('admin.products.form', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductRequest  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product) {
        $inputs = $this->getInputs($request);
        if($request->has('image')) {
            $this->deleteImages($product);
        }
        $product->update($inputs);
        return back()->with('alert', config('messages.productupdated'));
    }

    protected function deleteImages($product) {
        File::delete([
            public_path('/images/') . $product->image,
            public_path('/images/thumbs/') . $product->image,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Product $product) {
        $this->deleteImages($product);
        $product->delete();
        return redirect(route('products.index'));
    }
}
