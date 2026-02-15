<?php
namespace App\Controllers;
class App
{
    public function index()
    {
        
        view('index',[
            'titleBage'=>"Home",
           "header"=>"Home"
        ]);

    }
    public function about()
    {
        view('about',[
            'titleBage'=>"about",
              "header"=>"About Us"
        ]);

    }
    public function contact()
    {
        view('contact',[
            'titleBage'=>"Contact",
             "header"=>"Contact Us"
        ]);

    }
}