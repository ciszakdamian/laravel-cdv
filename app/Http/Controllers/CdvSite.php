<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CdvSite extends Controller
{
    public function index(){
        //echo "cdvController";
        return ['site' => 'cdv.pl', 'city' => 'Poznań'];
    }
}
