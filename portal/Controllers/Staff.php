<?php
namespace portal\Controllers;
//class Routes implements \CSY2028\Routes
session_start();
class Staff
{
    private $pdo;
    private $enquiry;
    private $queries;

    public function __construct($enquiry,$queries)
    {
//        $this->get = $get;
//        $this->post = $post;
        $this->pdo = $pdo ?? "";
        $this->enquiry = $enquiry;
        $this->queries = $queries;

    }




    public function portal()
    {

        $variable1 = 'casehandler';

        $stmt = $this->queries->findAllwithClause($variable1);

        return ['templates' => 'myJobs.html.php',
            'title' => 'Portal',
            'variables' => ['stmt' => $stmt]
        ];
    }


    public function view()
    {       
            $stmt = $this->enquiry->find('urn', $_GET['urn'])[0];
        
        return ['templates' => 'view.html.php',
            'title' => 'View Query',
            'variables' => ['stmt' => $stmt
            ]
        ];
    }


    public function edit()
    {       
            $stmt = $this->enquiry->find('urn', $_GET['urn'])[0];

        return ['templates' => 'edit.html.php',
            'title' => 'Edit Query',
            'variables' => ['stmt' => $stmt
            ]
        ];
    }

    public function editSubmit(){
        $updatedQuery = [
            'urn' => $_POST['urn'],
            'title' => $_POST['title'],
            'date' => $_POST['date'],
            'status' => $_POST['status'],
            'notes' => $_POST['notes'],
            'category' => $_POST['category'],
            'description' => $_POST['description'],
            'casehandler' => $_SESSION['userId'],
            'assigner' => $_POST['assignee'],
            'urn' => $_POST['urn']
        ];
        
        header('location: /staff/viewAllQueries');
        $stmt = $this->queries->updateQuery($updatedQuery);
  
        return ['templates' => 'edit.html.php',
        'title' => 'Edit Query',
        'variables' => ['stmt' => $stmt
        ]
    ];
    echo $stmt;


    }


    public function viewInprocessQuerys(){
        $variable1 = 'status';
        $value1 = 'In process';
        $variable2 = 'casehandler';
        $value2 = $_SESSION['userId'];
        $stmt = $this->queries->findRowsAndColumns($variable1, $value1, $variable2, $value2);
    

    
        return [
            'templates' => 'tableQueries.html.php',
            'title' => 'view in-process querys',
            'variables' => ['stmt' => $stmt]
        ];
    }

    public function viewRejectedQueries(){
        $variable1 = 'status';
        $value1 = 'Rejected';
        $variable2 = 'casehandler';
        $value2 = $_SESSION['userId'];
        $stmt = $this->queries->findRowsAndColumns($variable1, $value1, $variable2, $value2);
    

    
        return [
            'templates' => 'tableQueries.html.php',
            'title' => 'view in-process querys',
            'variables' => ['stmt' => $stmt]
        ];
    }


    public function viewApprovedQuerys(){
        $variable1 = 'status';
        $value1 = 'Approved';
        $variable2 = 'casehandler';
        $value2 = $_SESSION['userId'];
        $stmt = $this->queries->findRowsAndColumns($variable1, $value1, $variable2, $value2);
    

    
        return [
            'templates' => 'tableQueries.html.php',
            'title' => 'view in-process querys',
            'variables' => ['stmt' => $stmt]
        ];
    }

    public function viewAllQueries(){

        $variable2 = 'casehandler';

        $stmt = $this->queries->findAllwithClause($variable2);
    

    
        return [
            'templates' => 'tableQueries.html.php',
            'title' => 'view in-process querys',
            'variables' => ['stmt' => $stmt]
        ];
    }

    public function JobsAvailable() {
        // $stmt = $this->queries->findOthers('casehandler', '!=', $_SESSION['userId']);
        $variable2 = 'casehandler';

        $stmt = $this->queries->findAllwithClauseN($variable2);
        return [
            'templates' => 'viewAllJobs.html.php',
            'title' => 'Jobs available',
            'variables' => ['stmt' => $stmt]
        ];
    }
    
    

    public function addToList(){
        $updatedQuery = [
            'urn' => $_GET['urn'],
            'casehandler' => $_SESSION['userId'],
        ];
        
        $stmt = $this->queries->updateQuery($updatedQuery);
        header('location: /staff/viewAllQueries');
    
        return [
            'templates' => 'tableQueries.html.php',
            'title' => 'view in-process queries',
            'variables' => ['stmt' => $stmt]
        ];
    }
    


}