<?php

namespace App\Http\Controllers;
use mail;
use Illuminate\Http\Request;
use App\User;
use App\Notifications\TemplateEmail;
class NewhomeController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    function index(){
        $user = new User();
    $user->email = 'sdebarun04@gmail.com';  
    $user->notify(new TemplateEmail('hello world'));
        return view('newhome');

    }


    
}
