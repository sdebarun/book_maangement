<?php
namespace App\Repositories;

use App\InterfaceContainer\PublishersInterface;

use App\Publishers;

Class PublishersRepository implements PublishersInterface{
    protected $publisherModel; 

    public function __construct(Publishers $publishers){
        $this->publisherModel = $publishers;
    }

    public function addPublisher(array $data){
       return $this->publisherModel->create($data);
    }

    public function getAllPublishers(){
        return $this->publisherModel->all();
    }

    public function deletePublisher($id){
        return $this->publisherModel->find($id)->delete();
    }

    public function getPublisherbyid($id){
        return $this->publisherModel->find($id);
    }

    public function updatepublisher($id,$data){
        return $this->publisherModel->find($id)->update($data);
    }
}

?>