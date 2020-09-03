<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CountriesDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;
use App\Models\{ Country, Range };

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CountriesDataTable $dataTable) {
        return $dataTable->render('admin.shared.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.countries.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $country = Country::create($request->all());
        $ranges = Range::all();
        foreach($ranges as $range) {
            $range->countries()->attach($country, ['price' => 0]);
        }
        return back()->with('alert', config('messages.countrycreated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country) {
        return view('admin.countries.form', ['country' => $country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country) {
        $country->update($request->all());
        return back()->with('alert', config('messages.countryupdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Country $country
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Country $country) {
        $country->delete();
        return redirect(route('countries.index'));
    }

    public function alert(Country $country) {
        return view('admin.countries.destroy', ['country' => $country]);
    }
}
