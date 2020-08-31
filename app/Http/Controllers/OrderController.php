<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Services\Shipping;
use Illuminate\Http\Request;
use Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Shipping $ship) {
        $addresses = $request->user()->addresses()->get();
        if($addresses->isEmpty()) {
            // Là il faudra renvoyer l'utilisateur sur son compte quand on l'aura créé
        }
        $country_id = $addresses->first()->country_id;
        $shipping = $ship->compute($country_id);

        $content = Cart::getContent();
        $total = Cart::getTotal();
        $tax = Country::findOrFail($country_id)->tax;
        return view('order.index', compact('addresses', 'shipping', 'content', 'total', 'tax'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
