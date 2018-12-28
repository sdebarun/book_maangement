<?php 
namespace App\Repositories;
use App\InterfaceContainer\BooksInterface;
use App\Books;

class BooksRepository implements BooksInterface{
    protected $booksModel;

    public function __construct (Books $book){
        $this->booksModel = $book;
    }

    public function addbook($data){
        return $this->booksModel->create($data);
    }

    public function getAllBooks(){
        return $this->booksModel->all();
    }

    public function getThepublisher(){
        return $this->booksModel->getPublisher();
    }

    public function deletebook($id){
        return $this->booksModel->where('id',$id)->delete();
    }

    public function getBookbyid($id){
        return $this->booksModel->find($id);
    }

    public function updateBookdata($id,$data){
        return $this->booksModel->find($id)->update($data);
    }

    public function getCount($id){
        return $this->booksModel->where('publisher_id',$id)->count();
    }
    //testing pagination
    public function getAllBookspaginated(){
        return $this->booksModel->paginate(3);
    }
}
