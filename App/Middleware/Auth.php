<?php
namespace App\Middleware;

class Auth implements MiddlewareInterface
{
    public function handle()
    {
        if(!isset($_SESSION['user_id']))
            {
                header('location:/login');
                exit();
            }
    }

}