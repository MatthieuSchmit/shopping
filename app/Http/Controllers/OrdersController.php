<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ { Order, Shop };

class OrdersController extends Controller {

    public function index(Request $request) {
        $orders = $request->user()->orders()->with('state')->get();
        return view('account.orders.index', compact('orders'));
    }

    /**
     * Show order confirmation.
     *
     * @param integer $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function confirm(Request $request, $id) {
        $order = Order::with('products', 'adresses', 'state')->findOrFail($id);
        if(in_array($order->state->slug, ['cheque', 'mandat', 'virement', 'carte', 'erreur'])) {

            $this->authorize('manage', $order);

            $data = $this->data($request, $order);
            return view('order.confirm', $data);
        }
    }

    /**
     * Get order data
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return array
     */
    protected function data($request, $order) {
        $shop = Shop::firstOrFail();
        $data = compact('order', 'shop');
        if($order->state->slug === 'carte' || $order->state->slug === 'erreur') {
            // Là on s'occupera de Stripe
        }
        return $data;
    }

    public function show(Request $request, $id) {
        $order = Order::with('products', 'state', 'addresses', 'addresses.country')->findOrFail($id);
        $this->authorize('manage', $order);
        $data = $this->data($request, $order);
        return view('account.orders.show', $data);
    }

}
