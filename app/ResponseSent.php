<?php

namespace App;
use Response;

use Illuminate\Database\Eloquent\Model;

class ResponseSent extends Model
{
    public function sendResponse($status, $data, $message){
        $response = new Response();
        $response->status = $status;
        $response->data = $data;
        $response->message = $message;
        
        if($response->status == 'success'){
            return Response::json($response, 200);
        } else {
            return Response::json($response, 400);
        }
    }

    public function sendResponseKanban($status, $data, $message){
        $response = new Response();
        $response->status = $status;
        $response->data = $data;
        $response->message = $message;
        
        if($response->status == 'success'){
            return Response::json($response, 200);
        } else {
            return Response::json($response, 200);
        }
    }
}
