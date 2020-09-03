<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{ Country, Range, Colissimo };
use Illuminate\Http\Request;

class ColissimoController extends Controller {

    public function edit() {
        $countries = Country::with('ranges')->get();
        $ranges = Range::all();
        return view('admin.colissimos.edit', compact('countries', 'ranges'));
    }

    public function update(Request $request) {
        $data = $request->except('_method', '_token');
        // Validation
        $dataValidation = $data;
        foreach($dataValidation as $key => &$value ) {
            $value = 'required|numeric';
        }
        $request->validate($dataValidation);
        $colissimos = Colissimo::all();
        foreach($colissimos as $colissimo) {
            $price = $data['n' . $colissimo->id];
            if($colissimo->price !== $price) {
                $colissimo->price = $price;
                $colissimo->save();
            }
        }
        return back()->with('alert', config('messages.colissimosupdated'));
    }

}
