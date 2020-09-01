@extends('layouts.app')
@section('content')
    <div class="container" id="account">
        <h2>Mon compte</h2>
        <div class="row">
            <div class="col s12 m6"><a href="{{ route('identity.edit') }}" class="btn-large"><i class="material-icons left">person</i>Mes Données personnelles</a></div>
            <div class="col s12 m6"><a href="{{ route('addresses.index') }}" class="btn-large"><i class="material-icons left">location_on</i>Mes Adresses</a></div>
            <div class="col s12 m6"><a href="{{ route('orders.index') }}" class="btn-large @unless($orders) disabled @endif"><i class="material-icons left">shopping_cart</i>Mes Commandes</a></div>
            <div class="col s12 m6"><a href="{{ route('rgpd') }}" class="btn-large"><i class="material-icons left">visibility</i>RGPD</a></div>
        </div>
    </div>
@endsection
