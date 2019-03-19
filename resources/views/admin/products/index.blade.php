@extends('layouts.dashboard')
@section('content')


    <table class="table table-striped">
        <thead>
        <tr>

            <th scope="col">id</th>
            <th>afbeelding</th>
            <th scope="col">name</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">price</th>
            <th scope="col">category_id</th>
            <th scope="col">brand_id</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
        <tr>

            <th>{{$product->id}}</th>
            <td><img height="50" src="{{$product->photo ? asset($product->photo->file) : 'http://placehold.it/400x400'}}" alt=""></td>
            <td><a href="{{route('products.edit', $product->id)}}">{{$product->name}}</a></td>
            <td>{{$product->title}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->category ? $product->category->name : 'Uncategorized'}}</td>
            <td>{{$product->brand ? $product->brand->name : 'Uncategorized'}}</td>

            <td>{{$product->created_at}}</td>
            <td>{{$product->updated_at}}</td>
        </tr>
        @endforeach
        </tbody>

    </table>
    <div class="row">
        <div class="col-12">
            <p class="text-center">{{$products->render()}}</p>
        </div>
    </div>
@endsection
