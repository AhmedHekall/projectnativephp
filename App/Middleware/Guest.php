<?php
namespace App\Middleware;

use App\Middleware\MiddlewareInterface;

class Guest implements MiddlewareInterface
{
    public function handle()
    {
       if (isset($_SESSION['user_id']))
        {
            header('location:/');
            exit;

        }
    }

}