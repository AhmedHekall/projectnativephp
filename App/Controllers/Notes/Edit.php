<?php
namespace App\Controllers\Notes;    
use Core\Database;
class Edit 
{
    private $dataBase;
    public function __construct(Database $db)
    {
        $this->dataBase = $db;
    }
    public function edit($id)
    {

        $note=$this->dataBase->query("SELECT * FROM notes WHERE id =:id",[
            ':id'=>$id
        ])->findOrFail();
        
        
        view('notes/edit',[
            'note'=>$note
        ]);


    }
    public function update()
    {
        
        
         $this->dataBase->query("UPDATE notes SET body=:body where id =:id",[
            ":body"=>$_POST['body'],
            ':id'=>$_POST['id']
                 ]);
         header('location:/notes');
         return;


    }
}