<?php
namespace effsoft\eff\response;

class JsonResult{

    private $status = 0;
    private $message = '';

    public function __construct($status = 0, $message = '')
    {
        $this->status = $status;
        $this->message = $message;
    }

    public static function getNewInstance(){
        return new JsonResult();
    }

    public function setStatus($status = 0){
        $this->status = $status;
        return $this;
    }

    public function setMessage($message = ''){
        $this->message = $message;
        return $this;
    }

    public function getResponse(){
        return [
            'status' => $this->status,
            'message' => $this->message,
        ];
    }
}