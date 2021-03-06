@extends('admin.layout')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('account.addresses.partials.address')
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{ route('back.addresses.index') }}" role="button"><i class="fas fa-arrow-left"></i> Retour à la liste des adresses</a>
        </div>
    </div><br>

@endsection