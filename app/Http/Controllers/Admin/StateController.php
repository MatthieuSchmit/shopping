<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\StatesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StateRequest;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StatesDataTable $dataTable) {
        return $dataTable->render('admin.shared.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.states.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateRequest $request) {
        State::create($request->all());
        return back()->with('alert', config('messages.statecreated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state) {
        return view('admin.states.form', ['state' => $state]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(StateRequest $request, State $state) {
        $state->update($request->all());
        return back()->with('alert', config('messages.stateupdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param State $state
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(State $state) {
        $state->delete();
        return redirect(route('states.index'));
    }

    public function alert(State $state) {
        return view('admin.states.destroy', ['state' => $state]);
    }
}
