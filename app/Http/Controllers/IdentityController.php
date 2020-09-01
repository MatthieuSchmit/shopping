<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Shop;
use Illuminate\Http\Request;

class IdentityController extends Controller {

    public function edit(Request $request) {
        return view('account.identity', ['user' => $request->user()]);
    }

    public function update(Request $request) {
        $user = $request->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email,' . $user->id,
        ]);
        $request->merge(['newsletter' => $request->has('newsletter')]);
        $user->update($request->all());
        $request->session()->flash('message', config('messages.accountupdated'));
        return back();
    }

    public function rgpd(Request $request) {
        $email = Shop::select('email')->firstOrFail()->email;
        return view('account.rgpd.index', compact('email'));
    }

    public function pdf(Request $request) {
        $user = $request->user();
        $user->load('addresses', 'orders', 'orders.state', 'orders.products');
        $shop= Shop::firstOrFail();
        $pdf = PDF::loadView('account.rgpd.pdf', compact('user', 'shop'));

        return $pdf->download('rgpd.pdf');
    }

}
