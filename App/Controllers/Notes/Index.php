<?php
namespace App\Controllers\Notes;
use Core\Database;
class Index
{
        private $dataBase;
    public function __construct(Database $db)
    {
        $this->dataBase = $db;
    }
    private function getNotes()
    {
        
        $notes =$this->dataBase->query("select * from notes")->get();
        return $notes;

    }
    public function index()
    {
        view('notes/index',[
    'notes'=>$this->getNotes() ,
    "titleBage"=>"notes",
    "header"=>"my Notes"
]); 


    }
}




// $config=require BASE_BATH . "config.php";
// $db=new Database($config["database"]);
// $notes =$db->query("select * from notes")->get();
// // dd($notes);
// view('notes/index',[
//     'notes'=>$notes ,
//     "titleBage"=>"notes",
//     "header"=>"my Notes"
// ]); 
