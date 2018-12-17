<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InterfaceContainer\BooksInterface;
use App\InterfaceContainer\AuthorInterface;
use App\InterfaceContainer\PublishersInterface;
use App\InterfaceContainer\BookAuthorRelationInterface;
use DB;

class BookController extends Controller
{
    protected $varBook;
    protected $varauthor;
    protected $varpublisher;
    protected $RelationObj;
    protected $status;
    function __construct(BooksInterface $varBook,AuthorInterface $varauthor,PublishersInterface $varpublisher, BookAuthorRelationInterface $RelationObj){
        $this->varBook = $varBook;
        $this->varauthor = $varauthor;
        $this->varpublisher = $varpublisher;
        $this->RelationObj = $RelationObj;
        $this->status=0;
    }

    public function AddNewBooks(){
        $data['publishers'] = $this->varpublisher->getAllPublishers()->toArray();
        $data['authors'] = $this->varauthor->getAllauthor()->toArray();
        return view('add-book',$data);
    }
    public function doAddbook(Request $req){
        $req->validate([
            'bookName' => ['required'],
            'publisher_id' => ['required'],
            'bookName' => ['required'],
        ]);
        $bookDetails = $req->all('bookName','publisher_id','bookDescription');
        $authorDetails = $req->input('authors');
        $retval['bookInsert'] = $this->varBook->addbook($bookDetails);
        $lastId =  $retval['bookInsert']->id;
        foreach ($authorDetails as $authorId){
            $data = array('book_id'=>$lastId,'author_id'=>$authorId);
            $retval['authorRel'] = $this->RelationObj->CreateRelation($data);
        }
        if($retval['authorRel']->id > 0 && $retval['bookInsert']->id > 0){
                $this->status = 1;
        }
        else{
            $this->status = 0;
        }
        return redirect('/books/add')->with('status', $this->status);
    }

    public function viewAllbooks(){
        $data['retval'] = $this->varBook->getAllBooks()->toArray();
        // echo "<pre>";
        // print_r($data['retval']);
        return view('list-books',$data);
    }
}
