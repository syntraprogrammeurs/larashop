<?php
use App\Category;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'Front@index');
Route::get('/products', 'Front@products');
Route::get('/products/details/{id}', 'Front@product_details');
Route::get('/products/categories', 'Front@product_categories');
Route::get('/products/brands', 'Front@product_brands');



Route::get('/blog','Front@blog');
Route::get('/blog/post/{id}', 'Front@blog_post');
Route::get('/contact-us', 'Front@contact_us');
Route::get('/login', 'Front@login');
Route::get('/logout', 'Front@logout');
Route::get('/checkout', 'Front@checkout');
Route::get('/cart', 'Front@cart');
Route::post('/cart','Front@cart');
Route::get('/clear-cart', 'Front@clear_cart');

Route::get('/search/{query}','Front@search');

/****/
Route::get('/insert', function(){
  Category::create(array('name' => 'MUSIC'));
  return 'category added';
});

Route::get('/read', function(){
   $category = new Category();
   $data = $category->all(array('name', 'id'));

   foreach ($data as $list){
       echo $list->id . ' ' . $list->name . '<br>';
   }
});

Route::get('/update', function(){
   $category = new Category();
   $mCategory = $category::find(6);
   $mCategory->name = 'HEAVY METAL';
   $mCategory->save();

   $data = $mCategory->all(array('name', 'id'));
    foreach ($data as $list){
        echo $list->id . ' ' . $list->name . '<br>';
    }
});

Route::get('/delete', function(){
    $category = new Category();
    $mCategory = $category::find(5);
    $mCategory->delete();

    $data = $mCategory->all(array('name', 'id'));
    foreach ($data as $list) {
        echo $list->id . ' ' . $list->name . '<br>';
    }
});

Route::auth();



Route::get('/admin', 'DashboardController@index');

/*brands*/

Route::resource('/brands','BrandsController');
Route::resource('/categories','CategoryController');
Route::resource('/subcategories','SubcategoryController');
Route::resource('/users','AdminUsersController');


