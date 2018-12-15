<?php 
namespace App\Repositories;
use App\InterfaceContainer\BooksInterface;
use App\Books;
use App\Author;

class BooksRepository implements BooksInterface{
    protected $booksModel;
    protected $authorModel;
    public function __construct(Books $book, author $authors){
        $this->booksModel = $book;
        $this->authorModel = $authors;
    }

    public function addbook(array $data){
        return $this->booksModel->create($data);
    }

    public function authorList(){
        return $this->authorModel->all();
    }
}

?>