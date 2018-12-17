<?php 
namespace App\InterfaceContainer;

interface BooksInterface {
    public function addbook($data);
    public function getAllBooks();
    public function getThepublisher();
    public function deleteBook($id);
    public function getBookbyid($id);
}
?>