<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OrdersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\State;
use Illuminate\Http\Request;

class OrderController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrdersDataTable $dataTable) {
        return $dataTable->render('admin.shared.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id) {
        $order = Order::with('addresses', 'products', 'state', 'user', 'user.orders', 'payment_infos')->findOrFail($id);
        // Cas du mandat administratif
        $abord_indice = State::whereSlug('annule')->first()->indice;
        $states = $order->payment === 'mandat' && !$order->purchase_order ?
            State::where('indice', '<=', $abord_indice)
                ->where('indice', '>', 0)
                ->get() :
            State::where('indice', '>=', $order->state->indice)->get();
        return view('admin.orders.show', compact('order', 'states', 'abord_indice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Order $commande
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Order $commande) {
        $commande->load('state');
        $states = State::all();
        if($request->state_id !== $commande->state_id) {
            // En cas de changement de type de paiement
            $indice_payment = $states->firstWhere('slug', 'cheque')->indice;
            $state_new = $states->firstWhere('id', $request->state_id);
            if($commande->state->indice ===  $indice_payment && $state_new->indice ===  $indice_payment){
                $commande->payment = $states->firstWhere('id', $request->state_id)->slug;
            }
            $commande->state_id = $request->state_id;
            $commande->save();
        }

        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
