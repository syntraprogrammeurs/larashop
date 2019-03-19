<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Photo;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('id','desc')->paginate(4);


        //$products =  Product::paginate(4);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $brands = Brand::lists('name','id')->all();
        $categories= Category::lists('name', 'id')->all();
        return view('admin.products.create',compact('brands','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();//alle velden uit het formulier in $input
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();//samenstelling bestandsnaam
            $file->move('images', $name);//het kopieren naar de map images
            $photo = Photo::create(['file'=>$name]);//in de tabel photo id en naam aanmaken
            $input['photo_id'] = $photo->id; //

        }
        Product::create($input);


        //$product = new Product();

        //$product->create($input);
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::findOrFail($id);//ophalen uit db
        $categories = Category::lists('name','id')->all();
        $brands = Brand::lists('name','id')->all();
        return view('admin.products.edit',compact('product','categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $product=Product::findOrFail($id);
        $input = $request->all();//alle velden uit het formulier in $input
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();//samenstelling bestandsnaam
            $file->move('images', $name);//het kopieren naar de map images
            $photo = Photo::create(['file'=>$name]);//in de tabel photo id en naam aanmaken
            $input['photo_id'] = $photo->id; //

        }
        $product->update($input);


        //$product = new Product();

        //$product->create($input);
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products');
    }
}
