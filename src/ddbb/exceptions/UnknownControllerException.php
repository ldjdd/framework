<?php
namespace ddbb\exceptions;

class UnknownControllerException extends Exception
{
    public function __construct($controller)
    {
        $message = "{$controller} not found!";
        parent::__construct($message);
    }
}