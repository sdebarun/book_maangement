<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  \App\InterfaceContainer\PublishersInterface as publisherInterface;
use Illuminate\Support\Facades\Validator;
class PublishersController extends Controller
{
    protected $publisherobj;
    protected $status;
    function __construct(publisherInterface $var_publihser){
        $this->publisherobj = $var_publihser;
        $this->status=0;
    }

    public function viewaddPublisher(){
        return view('add-publisher');
    }

    public function createPublisher(Request $request){
        $request->validate([
            'publisherName' => ['required', 'string', 'max:255','unique:publishers'],
        ]);
       $retval =  $this->publisherobj->addPublisher($request->all());
       if($retval->id > 0){
            $this->status = 1;
       }
       else{
        $this->status = 0;
       }
       return redirect('/publisher/add')->with('status', $this->status);
        
    }
    
    public function listPublishers(){
        $data['retval'] = $this->publisherobj->getAllPublishers()->toArray();
        return view('list-publishers',$data);
    }

    public function deletePublisher($id = null){
        $retval = $this->publisherobj->deletePublisher($id);
        if($retval > 0){
            $this->status = 1;
        }
        else{
        $this->status = 0;
        }
       return redirect('/publisher/viewall')->with('status', $this->status);
    }

    public function editPublisher($id = null){
        $data['retval'] = $this->publisherobj->getPublisherbyid($id)->toArray();
        return view('single-publisher',$data);
    }

    public function doeditPublisher(Request $request,$id){
        $request->validate([
            'publisherName' => ['required', 'string', 'max:255'],
        ]);
        $retval = $this->publisherobj->updatepublisher($id,$request->all());
        if($retval > 0){
            $this->status = 1;
        }
        else{
            $this->status = 0;
        }
       return redirect("/publisher/edit/$id")->with('status', $this->status);
    }

}
