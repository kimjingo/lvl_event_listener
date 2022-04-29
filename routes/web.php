<?php

use Illuminate\Support\Facades\Route;

use App\Events\PurchasedSuccessfully;

use App\Models\Item;
use App\Models\Purchase;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $items = Item::all();
    return view('check-out', compact('items'));
});

Route::post('/purchase', function (Request $request) {
    // dd($request->quantity);
    $items=[];

    foreach($request->quantity as $key=> $quantity){
        if($quantity) $items[$request->items[$key]] = $quantity;
    }
    // dd($items);
    $purchase = Purchase::create($request->only(
        'name',
        'email',
        )
        +
        ['items' => json_encode($items)]
    );
    PurchasedSuccessfully::dispatch($purchase);
    // return $purchase;
    // return view('welcome');
});



