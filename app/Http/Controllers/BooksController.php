<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InterfaceContainer\BooksInterface as books;
use App\InterfaceContainer\AuthorInterface as author;
use  \App\InterfaceContainer\PublishersInterface as publisherInterface;
use App\Publishers;
class BooksController extends Controller
{
    protected $booksobj;
    protected $authorobj;
    protected $publisherobj;
    protected $status;

    public function __constructor(books $var_books, author $author ,publisherInterface $publisher){
        $this->booksobj = $var_books;
        $this->authorobj = $author;
        $this->publisherobj = $publisher;
        $this->status = 0;
    }

    public function AddNewBooks(){
        // $data['publishers1'] = $this->publisherobj->getAllPublishers()->toArray();
        // print_r($data);
        // die;
        $data['publishers'] = Publishers::all()->toArray();
        return view('add-book',$data);
    }

    public function doAddbook(Request $request){
        $retval = $this->booksobj->addbook($request->all('bookName','publisher','bookDescription'));
        if($retval->id > 0){
            $this->status = 1;
       }
       else{
        $this->status = 0;
       }
       return redirect('/books/add')->with('status', $this->status);
    }
}
