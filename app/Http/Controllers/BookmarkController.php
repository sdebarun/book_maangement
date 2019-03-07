<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  \App\InterfaceContainer\BookmarkInterface;
class BookmarkController extends Controller
{
    protected $bookmark;
    function __construct(BookmarkInterface $bookmarkInterface)
    {
        $this->bookmark = $bookmarkInterface;
    }
    
    public function addMark(){
        return view('add-bookmark');
    }
}
