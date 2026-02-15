<?php
namespace App\Services\Auth\Exception;
use Exception;

//custom exceptions 
class ValidationException extends Exception
{
    public string $field;
    public function __construct(string $field, string $message)
    {
        parent::__construct($message);
        $this->field = $field;
    }
}