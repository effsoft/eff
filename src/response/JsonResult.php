<?php
namespace effsoft\eff\response;

class JsonResult{

    private $status = 0;
    private $message = '';

    public static function getNewInstance(){
        return new JsonResult();
    }

    public function setStatus($status){
        $this->status = $status;
        return $this;
    }

    public function setMessage($message){
        $this->message = $message;
        return $this;
    }

    public function getResult(){
        return [
            'status' => $this->status,
            'message' => $this->message,
        ];
    }
}