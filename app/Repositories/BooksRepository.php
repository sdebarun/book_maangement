<?php 
namespace App\Repositories;
use App\InterfaceContainer\BooksInterface;
use App\Books;

class BooksRepository implements BooksInterface{
    protected $booksModel;

    public function __construct(Books $book){
        $this->booksModel = $book;
    }

    public function addbook(array $data){
        return $this->booksModel->create($data);
    }
}

?>