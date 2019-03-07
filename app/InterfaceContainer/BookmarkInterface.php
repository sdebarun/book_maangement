<?php
namespace App\InterfaceContainer;

interface BookmarkInterface {
    public function addNewMark($data);
    public function viewAllMark();
}