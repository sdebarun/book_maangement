<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
class TestController extends Controller
{
    public function testConfigGetcall(){
        return Config::get("settings.path.URIPATH");
    }
}
