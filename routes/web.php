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

Route::get('/address/{city}/{street}', function(String $city, String $street) {
    echo <<<ADDRESS
        Miasto: $city<br>
        Ulica: $street
        <hr>
ADDRESS;
});

Route::get('/address/{city?}/{street?}/{zipCode?}', function(String $city ="brak danych", String $street = "brak danych", Int $zipcode = null) {
    if (is_null($zipcode)){
        $zipcode = " brak ";
    }else{
        $zipcode = substr($zipcode, 0, 2)."-".substr($zipcode, 3, 4);
    }
    echo <<<ADDRESS
        Miasto: $city<br>
        Ulica: $street <br>
        Kod: $zipcode 
        <hr>
ADDRESS;
})->name('address');

//http://host/admin/home/Ann
Route::redirect('adres/{city?}/{street?}/{zipcode?}', '/address/{{city?}/{street?}/{zipcode?}');

Route::prefix('admin')->group(function (){

    Route::get('/home/{name}', function(String $name){
        echo "Witaj $name na stronie administracyjnej";
    });

    Route::get('users', function(){
        echo "<h3>Uzytkownicy systemu</h3>";
    });

});

Route::redirect('admin/{name}', '/admin/home/{name}');

Route::get('/user/{name}/{surname}/{age?}', function(String $name, String $surname, int $age = null){
   echo "test";
})->where(['name' => '[a-zAZ]{2,}'],['surname' => '[a-zAZ]{2,}'],['age' => '[0-9]{1,3}'] );

Route::get('/cdv1/{city}', function(String $city){
    return view('cdv', [
       'name' => 'Janusz',
       'surname' => 'Nowak',
       'city' => $city
    ]);
});

Route::get('/loop', function (){
   //return view('loop');

   $car = [
    ['brand' => 'Ferrari', 'model' => 'F430', 'color' => 'red' ],
       ['brand' => 'Audi', 'model' => 'A4', 'color' => 'black' ],
       ['brand' => 'Fiat', 'model' => '126p', 'color' => 'red' ]

   ];
   return view('loop', ['car' => $car]);
});

Route::get('/egzamin', function (){
    $egzamin = [
        ['Imie' => 'Jan', 'Nazwisko' => 'Nowak', "Przedmiot" => "Matematyka", 'Ocena' => '5' ],
        ['Imie' => 'Zbigniew', 'Nazwisko' => 'Noga', "Przedmiot" => "Matematyka", 'Ocena' => '1' ]
    ];

    foreach ($egzamin as $i){
        echo $i['Imie']." ".$i['Nazwisko']." ".$i['Przedmiot']." ".$i['Ocena']." <br/>";
    }

});

Route::get('/site/{cdvsite}', 'CdvSite@index');

Route::get('/drives/{drive}', 'PageController@show');

Route::get('/drives', 'PageController@index');

Route::get('/userform', function(){

  return view('userform');
});

Route::view('/userform1', 'userform');
Route::post('usercontroller', 'userController@account');

Route::view('/user', 'userform');
Route::post('userController1', 'userController1@index');
