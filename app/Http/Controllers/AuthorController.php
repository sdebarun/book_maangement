<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  \App\InterfaceContainer\AuthorInterface as author;
use DB;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    protected $authorobj;
    protected $err;
    
    function __construct(author $author){
        $this->authorobj = $author;
        $this->err=0;
    }

    public function addAuthor(){
        return view('add-author');
    }

    public function createAuthor(Request $request){
        $request->validate([
            'authorName' => ['required', 'string', 'max:255','unique:author'],
        ]);
       $retval =  $this->authorobj->addAuthor($request->all());
       if($retval->id > 0){
            $this->err = 1;
       }
       else{
        $this->err = 0;
       }
       return redirect('/author/add')->with('status', $this->err);
        
    } 

    public function listAuthors(){
        $data['retval'] = $this->authorobj->getAllauthor()->toArray();
        return view('list-authors',$data);
    }

    public function deleteAuthor($id = null){
        echo $id;
    }

}
