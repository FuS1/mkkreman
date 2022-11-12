<?php

namespace App\Exceptions;

use Exception;

class ErrorException extends Exception
{   
    public function render($request)
    {       
        return response([
            'ERR_MSG'=>$this->getMessage()
        ],400);    
    }
}