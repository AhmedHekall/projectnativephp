<?php
namespace App\Services\Auth;
use App\Services\Auth\Exception\ValidationException;
use App\Repositories\UserRepository;

class AuthService
{
    private UserRepository $users;
    

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function attempt(string $email, string $password): bool
    {
        
        $user = $this->users->findByEmail($email);
       

        if (!$user) {
            throw new ValidationException('email','Email is not exists');
            
        }

        // 2) verify password
        if (!password_verify($password, $user['password'])) {
            throw new ValidationException('password','pessword is not valid');
        }
        


       

        // 3) login (session)
        session_regenerate_id(true);
       $_SESSION['user_id'] =
        [
            'id'=>$user['id'],
            'name'=>$user['name'],
            'email'=>$user['email']

        ];

        return true;
    }
     public function register(string $name,string $email, string $password): array
    {
        
        if ($this->users->findByEmail($email)) {
            throw new ValidationException('email','Email already exists');
        }

        // 2) Hash password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // 3) Create user
        $user = $this->users->create([
            'name'=>$name,
            'email' => $email,
            'password' => $hashedPassword
        ]);

        
        session_regenerate_id(true);
        $_SESSION['user_id'] =
        [
            'id'=>$user['id'],
            'name'=>$user['name'],
            'email'=>$user['email']

        ];

        return $user;
    }


    public function logout(): void
    {
        $_SESSION = [];
        session_destroy();
        $params = session_get_cookie_params();
       setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}

