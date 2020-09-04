@extends('layouts.app')

@section('content')

    <div class="container">
        <div class=row>
            <div class="col s12 m12">
                <h3>{{$category->name}}</h3>
                <h4>Produits</h4>
                @foreach($category->products as $product)
                    {{$product->name}} <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
