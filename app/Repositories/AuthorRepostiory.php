<?php
namespace App\Repositories;

use App\InterfaceContainer\AuthorInterface;

use App\Author;

Class AuthorRepostiory implements AuthorInterface{
    protected $authorModel; 

    function __construct(Author $author){
        $this->authorModel = $author;
    }

    public function addAuthor(array $data){
       return $this->authorModel->create($data);
    }

    public function getAllauthor(){
        return $this->authorModel->all();
    }
}

?>