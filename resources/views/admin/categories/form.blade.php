@extends('admin.layout')

@section('css')
    <style>
        .custom-file-label::after { content: "Parcourir"; }
    </style>
@endsection

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

                    <form method="POST" action="@isset($category) {{ route('categories.update', $category->id) }} @else {{ route('categories.store') }} @endisset" enctype="multipart/form-data">
                        <div class="card-body">
                            @isset($category) @method('PUT') @endisset
                            @csrf

                            <x-inputbs4
                                    name="name"
                                    type="text"
                                    label="Nom"
                                    :value="isset($product) ? $product->name : ''"
                            ></x-inputbs4>
                                <x-select-two
                                        name="category_id"
                                        label="Parent"
                                        route="{{url('api/categories')}}"
                                ></x-select-two>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <a class="btn btn-primary" href="{{ route('categories.index') }}" role="button"><i class="fas fa-arrow-left"></i> Retour à la liste des produits</a>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection