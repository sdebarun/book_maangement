<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewhomeController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    function index(){

        return view('newhome');
    }

    
}
