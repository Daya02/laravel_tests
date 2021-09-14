@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Livres') }}</div>

                <div class="card-body">
                    <a href="{{ url('admin/produits') }}">Gestion des livres</a>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
