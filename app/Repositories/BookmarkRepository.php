<?php
namespace App\Repositories;
use App\InterfaceContainer\BookmarkInterface;
use App\Bookmark;

class BookmarkRepository implements BookmarkInterface{
    protected $bookmarkModel;
    function __construct(Bookmark $val)
    {
        $this->bookmarkModel = $val;
    }

    public function addNewMark($data){
        return $this->bookmarkModel->create($data);
    }
    public function viewAllMark(){
        return $this->bookmarkModel->all();
    }
}