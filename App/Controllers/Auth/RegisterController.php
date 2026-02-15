<?php
namespace App\Controllers\Auth;

use App\Services\Auth\AuthService;
use App\Services\Auth\Exception\ValidationException;
use Core\Validator;

class RegisterController
{
    private AuthService $auth;
    private array $errors=[];

    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }
    public function newRegister()
    {
         view('registeration/create');
    }

    public function register()
    {
        $input = [
        'name'=>$_POST['firstname']??null,
        'email' => $_POST['email'] ?? null,
        'password' => $_POST['password'] ?? null
         ];
        // 1) validate input
        if (! Validator::email($input['email'] ?? null)) {
            $this->errors['email']='invalid email';

        }
        if(Validator::string($input['name'],5,20))
            {
                $this->errors['name']= 'invalid name';

            }

        if (Validator::string($input['password'],10,30) or Validator::password($input['password'])===0) {
            
  
             $this->errors['password'] ='invalid password';
        }

        // 2) register via AuthService
        if (empty($this->errors))
        {

              try 
            {
            $this->auth->register($input['name'],$input['email'], $input['password']);
            header('Location: /');
            exit();
            }
         catch (ValidationException $e)
         {
            // تحوّل الاستثناء لخطأ يظهر للمستخدم
            $this->errors['email'] = $e->getMessage();
         }
        }
        
        // 3) success
        
        view('registeration/create',[
            'error'=>$this->errors
        ]);
    }
}
