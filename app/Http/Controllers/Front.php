<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Cart;
Use Braintree;

class Front extends Controller
{
    //
    var $brands;
    var $categories;
    var $products;
    var $title;
    var $description;

    public function __construct(){
        $this->brands = Brand::all(array('name'));
        $this->categories = Category::all(array('name'));
        $this->products = Product::all(array('id','name','price','title'));
    }

    public function index(){
        return view('home2',array('title' => 'Welcome', 'description'=>'lorem ipsum', 'page'=>'home',
            'brands'=>$this->brands, 'categories' => $this->categories, 'products'=>$this->products ));
    }
    public function products(){
        return view('products',array('title' => 'Products listing', 'description'=>'lorem ipsum', 'page'=>'products',
            'brands'=>$this->brands, 'categories' => $this->categories, 'products'=>$this->products ));
    }
    public function product_details($id){
        $product = Product::find($id);
        return view('product_details',array('product' => $product,'title'=>$product->name,
            'description'=>$product->description, 'page'=>'products',
            'brands'=>$this->brands, 'categories' => $this->categories, 'products'=>$this->products ));
    }
    public function product_categories($name){
        return view('products',array('title' => 'Welcome', 'description'=>'lorem ipsum', 'page'=>'products',
            'brands'=>$this->brands, 'categories' => $this->categories, 'products'=>$this->products ));
    }
    public function product_brands($name, $category = null){
        return view('products',array('title' => 'Welcome', 'description'=>'lorem ipsum', 'page'=>'products',
            'brands'=>$this->brands, 'categories' => $this->categories, 'products'=>$this->products ));
    }
    public function blog(){
        return view('blog',array('title' => 'Welcome', 'description'=>'lorem ipsum', 'page'=>'blog',
            'brands'=>$this->brands, 'categories' => $this->categories, 'products'=>$this->products ));
    }
    public function blog_post($id){
        return view('blog_post',array('title' => 'Welcome', 'description'=>'lorem ipsum', 'page'=>'blog',
            'brands'=>$this->brands, 'categories' => $this->categories, 'products'=>$this->products ));
    }
    public function contact_us(){
        return view('contact_us',array('title' => 'Welcome', 'description'=>'lorem ipsum', 'page'=>'contact_us'));
    }
    public function login(){
        return view('login',array('title' => 'Welcome', 'description'=>'lorem ipsum', 'page'=>'home'));
    }
    public function logout(){
        return view('logout',array('title' => 'Welcome', 'description'=>'lorem ipsum', 'page'=>'home'));
    }
    public function welcome(){
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        $token = $gateway->ClientToken()->generate();
        return view('cart',compact('token','cart')
        );
    }


    public function cart(){
        if(Request::isMethod('post')){
            $product_id = Request::get('product_id');
            $product = Product::find($product_id);
            Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price));
        }
        $cart = Cart::content();

        //increment
        if (Request::get('product_id') && (Request::get('increment')) == 1) {
            $item = Cart::search(
                function($key, $value) {
                    return $key->id == Request::get('product_id');
                })->first();
            Cart::update($item->rowId, $item->qty + 1);
        }

        if (Request::get('product_id') && (Request::get('decrease')) == 1) {
            $item = Cart::search(function($key, $value) { return $key->id == Request::get('product_id'); })->first();
            Cart::update($item->rowId, $item->qty - 1);
        }

               //delete item
        if (Request::get('product_id') && (Request::get('delete')) == 1) {
            $item = Cart::search(function($key, $value) { return $key->id == Request::get('product_id'); })->first();
            Cart::remove($item->rowId);
        }


        //return view('cart',array('cart' => $cart, 'title' => 'Welcome', 'description' => 'lorem','page'=>'home'));
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        $token = $gateway->ClientToken()->generate();
        return view('cart',compact('token','cart')
        );
    }

    public function clear_cart(){
        Cart::destroy();
        return Redirect::away('cart');
    }



    public function search($query){
        return view('products',array('title' => 'Welcome', 'description'=>'lorem ipsum', 'page'=>'products'));
    }
}
