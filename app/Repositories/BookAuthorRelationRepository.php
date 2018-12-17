<?php

namespace App\Repositories;
use App\InterfaceContainer\BookAuthorRelationInterface;
use App\Book_Author_Relationship;

class BookAuthorRelationRepository implements BookAuthorRelationInterface{
    protected $relationModel;
    public function __construct (Book_Author_Relationship $relation){
        $this->relationModel = $relation;
    }

    public function CreateRelation($data){
        return $this->relationModel->create($data); 
    }

    public function deleteRel($id){
        return $this->relationModel->where('book_id',$id)->delete(); 
    }
}