<?php
namespace App\Policies;


class Csrf
{
    private $sessionKey='_csrf';
    //store token
    public function token ()
    {
        if (empty($_SESSION[$this->sessionKey]))
        {
             $_SESSION[$this->sessionKey] = bin2hex(random_bytes(32)); 
        }
        return $_SESSION[$this->sessionKey];
    }
    //   ? is mean variable $token could it be kind (string or null)
    public function validate(?string $token): bool
    {
       if ( !isset($_SESSION[$this->sessionKey]) || !$token || !hash_equals($_SESSION[$this->sessionKey], $token) ) 
    { return false; }
     return true; 
     }
     //deletes old token
     public function regenerate(): void 
     { 
        unset($_SESSION[$this->sessionKey]); 
     } 


}