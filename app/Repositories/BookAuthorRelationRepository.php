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

    public function updateRelationalData($data){
        return $this->relationModel->updateOrcreate($data)->toArray();
    }
    public function destroyData($id){
        return $this->relationModel->where('book_id',$id)->forcedelete();
    }

    public function getCount($id){
        return $this->relationModel->where('author_id',$id)->count();
    }
}