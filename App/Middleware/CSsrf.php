<?php
namespace App\Middleware;
use \App\Policies\Csrf;
use App\Services\Auth\Exception\Exception;


class CSsrf implements MiddlewareInterface
{
    private $csrf ;
    
   public function __construct(Csrf $csrf)
    {
        $this->csrf=$csrf;
        
    }
   
    
    public function handle()
    {
        if($_SERVER['REQUEST_METHOD']!=='POST')
        {
             $_SESSION = [];
        session_destroy();
        $params = session_get_cookie_params();
       setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
            
            header('location:/');
       
        }


        $token = $_POST['_csrf'] ?? null;

        if ($this->csrf->validate($token)) {
            throw new \Exception('CSRF token mismatch');
        }
       

        
    }
}