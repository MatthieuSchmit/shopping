<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Range;

class RangeController extends Controller {

    public function edit() {
        $ranges = Range::all();
        return view('admin.ranges.edit', compact('ranges'));
    }

    public function update(Request $request) {
        $data = $request->except('_method', '_token');
        $ranges = Range::all();
        // Traitement des éventuelles plages supprimées
        $diff = $ranges->count() - count($data);
        if($diff > 0) {
            $index = $diff;
            while($index--) {
                Range::latest('id')->first()->delete();
            }
        }
        // Mise à jour des valeurs des plages existantes
        $ranges = Range::all();
        $index = 1;
        foreach($ranges as $range) {
            $range->max = $data[$index++];
            $range->save();
        }
        // Ajout éventuel de plages
        if($diff < 0) {
            $index = $diff;
            $countries = Country::all();
            while($index++) {
                $range = Range::create(['max' => $data[count($data) + $index]]);
                // Affectations par défaut aux pays
                foreach($countries as $country) {
                    $range->countries()->attach($country, ['price' => 0]);
                }
            }
        }

        return back()->with('alert', config('messages.rangesupdated'));
    }

}
