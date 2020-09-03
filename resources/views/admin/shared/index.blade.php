@extends('admin.layout')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                {{ $dataTable->table(['class' => 'table table-bordered table-hover table-sm'], true) }}
                @if(Route::currentRouteName() === 'countries.index')
                    <a class="btn btn-primary" href="{{ route('countries.create') }}" role="button">Créer un nouveau pays</a>
                @endif
                @if(Route::currentRouteName() === 'states.index')
                    <a class="btn btn-primary" href="{{ route('states.create') }}" role="button">Créer un nouvel état</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    {{ $dataTable->scripts() }}

@endsection