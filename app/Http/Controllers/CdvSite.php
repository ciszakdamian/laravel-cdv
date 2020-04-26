<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CdvSite extends Controller
{
    public function index($site){
        //echo "cdvController";
        return ['site' => $site, 'city' => 'Poznan'];
    }
}
