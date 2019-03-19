@extends('layouts.dashboard')
@section('content')
    <h1>Edit Product</h1>
    <div class="row">
        <div class="col-md-3">
            <img class="img-responsive" src="{{$product->photo ? asset($product->photo->file) : 'http://placehold.it/400x400'}}">
        </div>

        <div class="col-md-9">
            {!! Form::model($product,['method'=>'PATCH', 'action'=>['ProductsController@update', $product->id],
            'files'=>true])
             !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::text('price', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', [''=>'Choose options'] + $categories,null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('brand_id', 'Brand:') !!}
                {!! Form::select('brand_id', [''=>'Choose options'] + $brands,null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update Product', ['class'=>'btn btn-primary col-md-6']) !!}
            </div>

            {!! Form::close() !!}
            {!! Form::open(['method'=>'DELETE', 'action'=>['ProductsController@destroy', $product->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Product', ['class'=>'btn btn-danger col-md-6']) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>

@stop