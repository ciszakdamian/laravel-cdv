<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Data extends Controller
{
    function list(){
        return Http::get('https://jsonplaceholder.typicode.com/posts')->body;
    }
}
