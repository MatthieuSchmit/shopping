@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        @if(session()->has('alert'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('alert') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <form method="POST" action="@isset($country) {{ route('countries.update', $country->id) }} @else {{ route('countries.store') }} @endisset">
                        <div class="card-body">
                            @isset($country) @method('PUT') @endisset
                            @csrf

                            <x-inputbs4
                                    name="name"
                                    type="text"
                                    label="Nom"
                                    :value="isset($country) ? $country->name : ''"
                            ></x-inputbs4>
                            <x-inputbs4
                                    name="tax"
                                    type="text"
                                    label="Taxe"
                                    :value="isset($country) ? $country->tax : ''"
                            ></x-inputbs4>
                                <x-inputbs4
                                        name="code"
                                        type="text"
                                        label="Code"
                                        :value="isset($country) ? $country->code : ''"
                                ></x-inputbs4>
                        </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <a class="btn btn-primary" href="{{ route('countries.index') }}" role="button"><i class="fas fa-arrow-left"></i> Retour à la liste des pays</a>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
