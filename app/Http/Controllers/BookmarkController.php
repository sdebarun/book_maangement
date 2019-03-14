<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\InterfaceContainer\BookmarkInterface;
use \App\InterfaceContainer\BooksInterface;
class BookmarkController extends Controller
{
    protected $bookmark;
    protected $books;
    function __construct(BookmarkInterface $bookmarkInterface, BooksInterface $books)
    {
        $this->bookmark = $bookmarkInterface;
        $this->books = $books;
    }
    
    public function addMark(){
        $data["books"] = $this->books->getAllBooks();
        return view('add-bookmark',$data);
    }

    public function doaddmark(Request $request){
        
        $data["status"] = 0;
        if ($request->hasFile('bookMarkIMage')) {
            $destinationPath = public_path().'/images/';
            $files = $request->file('bookMarkIMage'); 
            $file_name = $files->getClientOriginalName(); 
            if($files->move($destinationPath , $file_name)){
                $data["status"] = 1;
                return redirect('bookmarks/add')->with('status',$data["status"]);
            }
            
        
            // foreach ($files as $file) {//this statement will loop through all files.
            //     $file_name = $file->getClientOriginalName(); //Get file original name
            //     $file->move($destinationPath , $file_name); // move files to destination folder
            // }
        }
        
    }
}
