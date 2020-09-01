<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddress;
use App\Models\ { Address, Country };
use Illuminate\Http\Request;

class AddressController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $addresses = $request->user()->addresses()->with('country')->get();
        if($addresses->isEmpty()) {
            return redirect(route('addresses.create'))->with('message', config('messages.oneaddress'));
        }

        return view('account.addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $countries = Country::all();
        return view('account.addresses.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddress $storeAddress) {
        $storeAddress->merge(['professionnal' => $storeAddress->has('professionnal')]);
        $storeAddress->user()->addresses()->create($storeAddress->all());
        return redirect(route('adresses.index'))->with('alert', config('messages.addresssaved'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Address $address
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Address $address) {
        $this->authorize('manage', $address);
        $countries = Country::all();
        return view('account.addresses.edit', compact('address', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreAddress $storeAddress
     * @param Address $address
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(StoreAddress $storeAddress, Address $address) {
        $this->authorize('manage', $address);
        $storeAddress->merge(['professionnal' => $storeAddress->has('professionnal')]);
        $address->update($storeAddress->all());
        return redirect(route('addresses.index'))->with('alert', config('messages.addressupdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Address $address
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Address $address) {
        $this->authorize('manage', $address);
        $address->delete();
        return back()->with('alert', config('messages.addressdeleted'));
    }
}
