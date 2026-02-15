<?php 
namespace App\Controllers\Notes;
use Core\Database;

class Show
{
        private $dataBase;
    public function __construct(Database $db)
    {
        $this->dataBase = $db;
    }
    private function findNote($id)
    {  
        
        $note =$this->dataBase->query("select * from notes where id =:id",[
          ":id"=> $id,
          ])->findOrFail();
          
        return $note;
    }
    private function authotize($id)
    {
        authorize ($this->findNote($id)['user_id']== $_SESSION['user_id']['id']);
        return $this;
    }

    public function show($id)
    {
      
        if($this->authotize($id))
        {
            view("notes/show",[
             "titleBage"=>"note",
             "header"=>"this Note",
             "note"=>$this->findNote($id)
            ]);
        }
        else{
            abort(403);
        }
        
       

    }

}
