<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShopRequest;
use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller {

    public function edit() {
        $shop = Shop::firstOrFail();
        return view('admin.shop.edit', compact('shop'));
    }

    public function update(ShopRequest $request) {
        $request->merge([
            'invoice' => $request->has('invoice'),
            'card' => $request->has('card'),
            'transfer' => $request->has('transfer'),
            'check' => $request->has('check'),
            'mandat' => $request->has('mandat'),
        ]);
        Shop::firstOrFail()->update($request->all());
        return back()->with('alert', config('messages.shopupdated'));
    }
}
