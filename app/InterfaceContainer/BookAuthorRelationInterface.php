<?php
namespace App\InterfaceContainer;

interface BookAuthorRelationInterface{
    public function CreateRelation($data);
    public function deleteRel($id);
}