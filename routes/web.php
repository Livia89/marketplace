<?php

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
    return view('welcome');
});

Route::get('/model', function (){
    // $products = \App\Models\Product::all(); // select * from products

//    $user = new \App\User();
    $user = \App\User::find(2);
    $user->name = "Bruninha";
    $user->save();

    // \App\User::all(); // retorna todos os registos
    // \App\User::find(2); // retorna o registo pelo id
    // \App\User::where("name", 'Bruninha')->first(); // retorna o primeiro registo encontrado
    // \App\User::paginate(10); - paginar dados com laravel

    // Mass assigment - Atribuição em massa

//    $user = \App\User::create([
//        'name' => 'Lucila',
//        'email' => 'lucila@gmail.com',
//        'password' => bcrypt('98765431')
//
//    ]);

    $user = \App\User::find(42);
    $user->update([
        'name' => 'Joazinha'
    ]);

    return \App\User::all();

});
