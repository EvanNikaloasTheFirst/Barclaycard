<?php
namespace portal\Controllers;
//class Routes implements \CSY2028\Routes
class Supervisor
{
    private $pdo;
    private $queries;
    private $user;
    private $staff;

    public function __construct($queries,$user,$staff)
    {
//        $this->get = $get;
//        $this->post = $post;
        $this->pdo = $pdo ?? "";
        $this->queries = $queries;
        $this->user = $user;
        $this->staff = $staff;
        

    }



    public function seeAllJobs(){

       
        $stmt = $this->queries->findAll();
    
        return [
            'templates' => 'masterJobs.html.php',
            'title' => 'All Jobs',
            'variables' => ['stmt' => $stmt]
        ];
    }




   
    


}