<?php
namespace App\Controllers\Auth;

use App\Services\Auth\AuthService;
use App\Services\Auth\Exception\ValidationException;
use Core\Validator;

class LoginController
{
    private array $errors=[];
    private AuthService $auth;


    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }
    public function newlogin()
    {
        view('login/login');

    } 

    public function login()
    {
        $input=
        [
            'email'=>$_POST['email'],
            'password'=>$_POST['password']

        ];
       
        if (!Validator::email($input['email'] ?? null)) {
            $this->errors['email']='invalid email' ;
        }

        if (empty($input['password'])) {
            $this->errors['password']='password is require';
        }
        
        if (empty($this->errors))
        {

              try 
            {
             if($this->auth->attempt($input['email'], $input['password']))
                {
                    $this->auth->attempt($input['email'], $input['password']);
            header('Location: /');
            exit();

                }   
            
            }
         catch (ValidationException $e)
         {
            
            $this->errors[$e->field] = $e->getMessage();
         }
        }
        
        // 3) success
        
        view('login/login',[
            'error'=>$this->errors
        ]);

        

        
    }

    public function logout()
    {
        $this->auth->logout();
        header('Location: /');
      
    }
}
