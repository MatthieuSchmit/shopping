@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Produits en vedette</h3>
            <div class="col s12 cards-container">
                @foreach($products as $product)
                    <div class="card">
                        <div class="card-image">
                            @if($product->quantity)
                                <a href="{{ route('product.show', $product->id) }}">
                                    @endif
                                    <img src="{{ URL::asset('images/thumbs') }}/{{ $product->image }}">
                                    @if($product->quantity) </a> @endif
                        </div>
                        <div class="card-content center-align">
                            <p>{{ $product->name }}</p>
                            @if($product->quantity)
                                <p><strong>{{ number_format($product->price, 2, ',', ' ') }} € TTC</strong></p>
                            @else
                                <p class="red-text"><strong>Produit en rupture de stock</strong></p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
