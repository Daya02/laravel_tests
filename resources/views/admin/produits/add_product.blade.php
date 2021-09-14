@extends('layouts.app')
@section('content')
    <div class="container my-3">
        <div class="row">          
            <div class="col-12 card  my-5">           
                    <div class="card-body">
                        <h4 class="card-title">Ajouter un livre</h4>
                        @if (Session::has('status'))
                            <div class="alert alert-success">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                        {!! Form::open(['action' => 'App\Http\Controllers\ProductController@saveProduit', 'method' => 'POST', 'class' => 'cmxform', 'id' => 'commentForm', 'enctype' => 'multipart/form-data']) !!}
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('product_name') ? 'has-error' : '' }}">
                            {{ Form::label('', 'Nom du livre', ['for' => 'cname']) }}
                            {{ Form::text('product_name', '', ['class' => 'form-control', 'id' => 'cname']) }}
                            @if ($errors->has('product_name'))
                                <small class="text text-danger">
                                    {{ $errors->first('product_name') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('product_price') ? 'has-error' : '' }}">
                            {{ Form::label('', 'Prix du livre', ['for' => 'product_price']) }}
                            {{ Form::number('product_price', '', ['class' => 'form-control', 'id' => 'product_price']) }}
                            @if ($errors->has('product_price'))
                                <small class="text text-danger">
                                    {{ $errors->first('product_price') }}
                                </small>
                            @endif
                        </div> 
    
                        <div class="form-group {{ $errors->has('product_image') ? 'has-error' : '' }}">
                            {{ Form::label('', 'Image', ['for' => 'product_image']) }}
                            {{ Form::file('product_image', ['class' => 'form-control', 'id' => 'product_image']) }}
                            @if ($errors->has('product_image'))
                                <small class="text text-danger">
                                    {{ $errors->first('product_image') }}
                                </small>
                            @endif
                        </div>
                        {{ Form::submit('Ajouter', ['class' => 'btn btn-primary']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
        </div>
    </div>
@endsection
