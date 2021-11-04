<?php

namespace App\Errors;

use Exception;
use Throwable;


class CustomError extends Exception{
    public $message;

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null){

        parent::__construct($message, $code, $previous);
    }
    
    public function PageError404(){

        http_response_code(404);
        require '../../views/errors/page404.php';

    }
    public function SetErrorMessage($message):string{
        $this->message = $message;
        return $this->message;
    }
    public function GetErrorMessage(){
        $this->message;
    }
}