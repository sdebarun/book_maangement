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

    public function deleteBook($id = null){
        $retval['bookdelstatus'] = $this->varBook->deleteBook($id);
        $retval['relationdelsatus'] = $this->RelationObj->deleteRel($id);
        if($retval['bookdelstatus'] > 0 && $retval['relationdelsatus'] > 0){
            $this->status = 1;
        }
        if($retval['bookdelstatus'] == 0 || $retval['relationdelsatus'] == 0){
            $this->status = 0;
        }
        else{
        $this->status = 0;
        }
       return redirect('/books/viewall')->with('status', $this->status);
    }

    public function editBook($id = null){
        $data['bookDetails'] = $this->varBook->getBookbyid($id)->toArray();
        $data['publisherlist'] = $this->varpublisher->getAllPublishers()->toArray();
        $data['authorlist'] = $this->varauthor->getAllauthor()->toArray();
        // echo "<pre>";
        // print_r($data);
        return view("single-book",$data);
    }

    // public function doEditbook($id = null,Request $request){
    //     $authorDetails = $request->input('authors');
    //     print_r($authorDetails);
         
    // }
    public function doEditbook($id = null,Request $request){
        $request->validate([
            'bookName' => ['required', 'string', 'max:255'],
            'authors' => ['required'],
            'publisher_id' => ['required','integer']
        ]);
        $retval['bookDataupdate'] = $this->varBook->updateBookdata($id,$request->all('bookName','publisher_id','bookDescription'));
        $retval['relDelete'] = $this->RelationObj->destroyData($id);
        $authorDetails = $request->input('authors');
        echo "<pre>";
        print_r($authorDetails);
        foreach ($authorDetails as $authorId){
            echo $id;
            $data = array("book_id"=>$id,'author_id'=> $authorId);
            print_r($data);
            
            $retval['authorRelupdate'] = $this->RelationObj->updateRelationalData($data);
        }
        print_r($retval);
        echo $retval['authorRelupdate']['id'];
        if($retval['relDelete'] > 0 && $retval['bookDataupdate'] > 0 && $retval['authorRelupdate']['id']){
                $this->status = 1;
        }
        else{
            $this->status = 0;
        }
        return redirect("/books/edit/$id")->with('status', $this->status);
    }
    
}
