<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  \App\InterfaceContainer\BookmarkInterface;
use File;
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

    public function doaddmark(Request $request){
        if ($request->hasFile('bookMarkIMage')) {
            $destinationPath = public_path().'/images/';
            $files = $request->file('bookMarkIMage'); 
            $file_name = $files->getClientOriginalName(); 
            return $files->move($destinationPath , $file_name);
        
            // foreach ($files as $file) {//this statement will loop through all files.
            //     $file_name = $file->getClientOriginalName(); //Get file original name
            //     $file->move($destinationPath , $file_name); // move files to destination folder
            // }
        }
        
    }
}
