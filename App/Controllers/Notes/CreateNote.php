<?php
namespace App\Controllers\Notes; 
use Core\Database;
use Core\Validator;
class CreateNote
{

    private $errors=[];
    private $dataBase;
    public function __construct(Database $db)
    {
        $this->dataBase = $db;
    }
   
    public function create()
    {
      
        if($_SERVER['REQUEST_METHOD']==='GET')
        {
            
              view("notes/create",[
                       "titleBage"=>"create note",
                       "header"=>"Create Note"
    
                    ]);
                   
                    

        }
        if ($_SERVER['REQUEST_METHOD']==='POST')
            {
                
               if (Validator::string(value: $_POST['body'],min: 1,max: 100)===true)
                {

                   $this->errors['body'] ="A body of no more than 10 characters is require";  
                }
                if (empty($this->errors)){
                    return $this->save();

                }else
                {
                     view("notes/create",[
                       "titleBage"=>"create note",
                       "header"=>"Create Note",
                        "errors"=>$this->errors

    
                    
                    ]);
                   

                }


            }

           


    }
    private function save()
    {
        
                $this->dataBase->query('insert into `notes` (`body`,`user_id`) values(:body,:user_id)',[
                 ":body"=>$_POST['body'],
                ":user_id"=>$_SESSION['user_id']['id']

                ]);
    header("location:/notes");
    exit;
   

    }
    

    

}

