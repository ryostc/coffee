<?php

use App\Coffee;
use Illuminate\Http\Request;

/**
* コーヒーの一覧表示(coffees.blade.php)
*/
Route::get('/', function () {
    $coffees = Coffee::orderBy('created_at', 'asc')->get();
    return view('coffees', ['coffees' => $coffees]);
});

/**
* コーヒーを登録
*/
Route::post('/coffees', function (Request $request) {
    
    //バリデーション
    $validator = Validator::make($request->all(), [
        'store_name' => 'required| min:1 | max:255',
        'coffee_name' => 'required| min:1 | max:255',
        'reviwe' => 'required| min:1 | max:255',
        'date' => 'required',
    ]);

    //バリデーション:エラー 
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    
    // Eloquentモデル（登録処理）
    $coffees = new Coffee;
    $coffees->store_name = $request->store_name;
    $coffees->coffee_name = $request->coffee_name;
    $coffees->reviwe = $request->reviwe;
    $coffees->date = $request->date;
    $coffees->save(); 
    return redirect('/');  

});

/**
* コーヒーを更新 
*/
//更新画面の表示
Route::post('/coffeesedit/{coffees}', function(Coffee $coffees){
    //{coffees}id値を取得 => Coffee $coffees id値の１レコード取得
    return view('coffeesedit', ['coffee' => $coffees]);
});

//更新処理
Route::post('/coffees/update', function(Request $request){
    
   //バリデーション
   $validator = Validator::make($request->all(), [
       'id' => 'required',
       'store_name' => 'required| min:1 | max:255',
       'coffee_name' => 'required| min:1 | max:255',
       'reviwe' => 'required| min:1 | max:255',
       'date' => 'required',
    ]);
    
    //バリデーション:エラー 
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    
    // Eloquentモデル（更新処理）
    $coffees = Coffee::find($request->id);
    $coffees->store_name = $request->store_name;
    $coffees->coffee_name = $request->coffee_name;
    $coffees->reviwe = $request->reviwe;
    $coffees->date = $request->date;
    $coffees->save(); 
    return redirect('/');  
});



/**
* コーヒーを削除 
*/
Route::delete('/coffee/{coffee}', function (coffee $coffee) {
    $coffee->delete();
    return redirect('/');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

