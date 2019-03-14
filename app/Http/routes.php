<?php
use App\Category;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;

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
Route::post('/checkout', function(Request $request){

    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
    ]);
    $amount = $request->amount;
    $nonce = $request->payment_method_nonce;
    /***betaling transactie zelf**/
    $result = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodNonce' => $nonce,
        'options' => [
            'submitForSettlement' => true
        ],

    ]);
    /** gegevens van de klant bewaren in de vault van braintree***/
    $result2 = $gateway->customer()->create([
        'firstName' => 'Mike',
        'lastName' => 'Jones',
        'company' => 'Jones Co.',
        'email' => 'mike.jones@example.com',
        'phone' => '281.330.8004',
        'fax' => '419.555.1235',
        'website' => 'http://example.com'
    ]);

    if ($result->success) {
        $transaction = $result->transaction;
        // header("Location: transaction.php?id=" . $transaction->id);
        return back()->with('success_message', 'Transaction success. The ID is:'. $transaction->id);
    } else {
        $errorString = "";
        foreach($result->errors->deepAll() as $error) {
            $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }
        //$_SESSION["errors"] = $errorString;
        //header("Location: " . $baseUrl . "index.php");
        return back()->withErrors('An error occurred with the message: '.$result->message);
    }


});
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
Route::resource('/roles','RolesController');


