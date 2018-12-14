<?php 
namespace App\InterfaceContainer;

interface PublishersInterface{
    public function addPublisher(array $data);
    public function getAllPublishers();
    public function deletePublisher($id);
    public function getPublisherbyid($id);
    public function updatepublisher($id,$data);
}
?>