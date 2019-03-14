@extends('layouts.dashboard')
@section('content')
    <h1>Create Product</h1>
    <div class="row">

        <div class="col-md-12">
            {!! Form::open(['method'=>'POST', 'action'=>['ProductsController@store'],
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
                {!! Form::submit('Create Product', ['class'=>'btn btn-primary col-md-6']) !!}
            </div>

            {!! Form::close() !!}


        </div>
    </div>

@stop