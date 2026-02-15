<?php
namespace App\Controllers\Notes;   
use Core\Database;

class DeleteNotes
{
        private $dataBase;
    public function __construct(Database $db)
    {
        $this->dataBase = $db;
    }
    public function destroy($id)
    {
   
           
          
        $this->dataBase->query("delete from notes where id =:id",[
         ":id"=>$id
        ]);

        header('location:/notes');
        return ;


    }

}

