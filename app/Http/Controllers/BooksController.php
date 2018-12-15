<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InterfaceContainer\BooksInterface;
//use  \App\InterfaceContainer\AuthorInterface as author;
//use  \App\InterfaceContainer\PublishersInterface as publisherInterface;
use App\Publishers;
use App\Author;
use DB;
class BooksController extends Controller
{
    public $booksobj;
    public $status;

    public function __constructor(BooksInterface $booksobj){
        $this->booksobj = $booksobj;
        $this->status = 0;
    }

    public function AddNewBooks(){
        // $data['publishers1'] = $this->publisherobj->getAllPublishers()->toArray();
        //$data['authors1'] = $this->authorobj->getAllauthor()->toArray();
        // print_r($data);
        // die; 
        $data['publishers'] = Publishers::all()->toArray();
        $data['authors'] = Author::all()->toArray();
        return view('add-book',$data);
    }

    public function doAddbook(Request $request){
        // return $request->all();
        // dd($this->booksobj);
        $data['retval'] = $this->booksobj->addbook($request->all());
        $data['authorDetails']  = $request->authors;
        echo "<pre>";
        print_r($data);
        dd($request->all());
        die;
        if($retval->id > 0){
            $this->status = 1;
       }
       else{
        $this->status = 0;
       }
       return redirect('/books/add')->with('status', $this->status);
    }
}
