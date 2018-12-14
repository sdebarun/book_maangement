<?php
namespace App\InterfaceContainer;

interface AuthorInterface{
    public function addAuthor(array $data);
    public function getAllauthor();
    public function deleteAuthor($id);
    public function getAuthorbyid($id);
    public function updateAuthor($id,$data);
}
?>