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

    public function deleteAuthor($id){
        return $this->authorModel->find($id)->delete();
    }

    public function getAuthorbyid($id){
        return $this->authorModel->find($id);
    }

    public function updateAuthor($id,$data){
        return $this->authorModel->find($id)->update($data);
    }
}

?>