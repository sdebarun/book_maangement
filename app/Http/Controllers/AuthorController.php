<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  \App\InterfaceContainer\{AuthorInterface as author, BookAuthorRelationInterface};
use Illuminate\Support\Facades\Validator;
class AuthorController extends Controller
{
    protected $authorobj;
    protected $err;
    protected $rel;
    
    function __construct(author $author, BookAuthorRelationInterface $rel){
        $this->authorobj = $author;
        $this->err=0;
        $this->rel = $rel;
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
        $retval = '';
        $Is_attached = $this->rel->getCount($id);
        if($Is_attached > 0){
            $msg = $Is_attached;
        }
        else{
            $msg = '';
            $retval = $this->authorobj->deleteAuthor($id);
        }
        if($retval > 0){
            $this->err = 1;
        }
        else{
        $this->err = 0;
        }
       return redirect('/author/viewall')->with(['status' => $this->err,'msg'=> $msg]); //two variable can be used in flashData
    }

    public function editAuthor($id = null){
        $data['retval'] = $this->authorobj->getAuthorbyid($id)->toArray();
        return view('single-author',$data);
    }

    public function doeditAuthor(Request $request,$id){
        $request->validate([
            'authorName' => ['required', 'string', 'max:255'],
        ]);
        $retval = $this->authorobj->updateAuthor($id,$request->all());
        if($retval > 0){
            $this->err = 1;
        }
        else{
            $this->err = 0;
        }
       return redirect("/author/edit/$id")->with('status', $this->err);
    }

    public function viewPaginatedlist(){
        $data['retval'] = $this->authorobj->authorPaginated();
        // echo "<pre>";
        // print_r($data);
        return view('author-paginatedlist',$data);
    }

    public function viewfilteredData(Request $request){
        $endDate = (!empty($request->input('customEndDate')) ? $request->input('customEndDate') : date('Y-m-d H:i:s'));
        $startDate = (!empty($request->input('customStartDate')) ? $request->input('customStartDate'): $request->input('startDate'));
        $dateRange= [$startDate,$endDate];
        $data['retval'] = $this->authorobj->filteredAuthorpaginated($dateRange);
        // echo "<pre>";
        // print_r($data);
        return view('author-paginatedlist',$data);
    }

}
