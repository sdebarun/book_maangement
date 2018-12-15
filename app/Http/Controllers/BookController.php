<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InterfaceContainer\BooksInterface;

class BookController extends Controller
{
    protected $varBook;
    function __construct(BooksInterface $varBook){
        $this->varBook = $varBook;
    }

    public function doAddbook(Request $req){
        dd($this->varBook);
    }
}
