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
}
