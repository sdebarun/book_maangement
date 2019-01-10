<?php

namespace App\Http\Controllers\apiController;
use  \App\InterfaceContainer\{PublishersInterface as publisherInterface, BooksInterface};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
class PublisherController extends Controller
{
    protected $publisherobj;
    protected $status;
    protected $rel;
    function __construct(publisherInterface $var_publihser, BooksInterface $rel){
        $this->publisherobj = $var_publihser;
        $this->status=false;
        $this->rel = $rel;
    }

    public function listallpublishers(){
        try {
            $retval = $this->publisherobj->getAllPublishers()->toArray();
            return response()->json([
                            "success" => true,
                            "data" => $retval
            ]);
        } catch (JWTException $th) {
            
        }
    }

    public function createPublisher(Request $request){
        $request->validate([
            'publisherName' => ['required', 'string', 'max:255','unique:publishers'],
        ]);
       $retval =  $this->publisherobj->addPublisher($request->all());
       if($retval->id > 0){
            $this->status = true;
            return response()->json([
                "status" => $this->status,
                "message" => "Successfully added the publisher",
            ]);
       }
       else{
        return response()->json([
            "status" => $this->status,
            "message" => "Failed to add the publisher",
        ]);
       }
    }
}
