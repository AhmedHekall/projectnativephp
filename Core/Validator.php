<?php 
namespace Core;
class Validator 
{
    public static function string ($value,int $min=1, int $max=INF): bool
    {
        $value = trim($value);
        return  strlen($value)>$max || strlen($value) < $min  ;    


    }
    public static function password(string $password)
    {
       return preg_match('/^(?=.*[A-Za-z])(?=.*\d).+$/', $password);
           
    }
    public static function email($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
  

}