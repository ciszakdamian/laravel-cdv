<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/cdv', function() {
	//return view('cdv');
	//return 'cdv';
	//return ['name' => 'cdv', 'base' => 'classic'];
    return view('cdv', ['name' => 'Janusz', 'surname' => 'Nowak', 'city' => 'Poznań']);
});

Route::get('/pages/{x}', function($x) {
    $pages = [
        'about' => 'Strona CDV',
        'contact' => 'bok@cdv.pl',
        'home' => 'Strona domowa'
    ];
    return $pages[$x];
});

Route::get('/address/{city}', function(String $city) {
    echo "Miasto: ", $city;
});

Route::get('/address/{city}{street}', function(String $city, String $street) {
    echo <<<ADDRESS
        Miasto: $city<br>
        Ulica: $street
        <hr>
ADDRESS;

});
