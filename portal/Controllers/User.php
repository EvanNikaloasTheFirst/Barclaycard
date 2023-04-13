<?php
namespace portal\Controllers;
//class Routes implements \CSY2028\Routes
class User
{
    private $pdo;
    private $queries;
    private $userTable;

    public function __construct($queries,$userTable)
    {

        $this->pdo = $pdo ?? "";
        $this->queries = $queries;
        $this->userTable = $userTable;
        

    }



    public function login()
    {
        $_SESSION['loggedIn'] = false;
       
        $success = '';
        return ['templates' => 'home.html.php',
            'title' => 'Log in',
            'variables' => [
            ]
        ];
    }

    public function loginSubmit()
    {
            $user = $this->userTable->find('email', $_POST['email'])[0];

            if (($user['email'] == $_POST['email']) && $user['Password'] == $_POST['Password'] && $user['User'] == 'Y') {
                $_SESSION['loggedIn'] = true;
                $_SESSION['userId'] = $user['email'];

                $success = 'Client has been logged in';
                
                header('location: /user/dashboard');

            }

            else if (($user['email'] == $_POST['email']) && $user['Password'] == $_POST['Password'] && $user['Staff'] == 'Y' &&  $user['Admin'] == 'N') {
                $_SESSION['AdminloggedIn'] = true;
                $_SESSION['loggedIn'] = false;
                
                $success = 'Admin has been logged in';
                $_SESSION['userId'] = $user['email'];
         

                header('location: /staff/portal');

            }

            else if (($user['email'] == $_POST['email']) && $user['Password'] == $_POST['Password'] && $user['usertype'] == 'Supervisor') {
                $_SESSION['AdminloggedIn'] = true;
                $_SESSION['SupervisorloggedIn'] = true;
                $_SESSION['loggedIn'] = false;
                
                $success = 'Supervisor has been logged in';
                $_SESSION['userId'] = $user['email'];
         

                header('location: /supervisor/seeAllJobs');

            }
            // Supervisor
            else{
                $success = 'Invalid details';
            }

        return ['templates' => 'home.html.php',
            'title' => 'Log in',
            'variables' => ['success' => $success,
            ]
        ];
    }


    public function logout(){
        $_SESSION['loggedIn'] = false;
        $_SESSION['userId'] = null;
        $_SESSION['AdminloggedIn'] = false;
        $_SESSION['SupervisorloggedIn'] = false;
        $success = 'You have been logged out';

        return [
            'templates' => 'home.html.php',
            'title' => 'Dashboard',
            'variables' => ['success' => $success]
        ];
    }


    public function dashboard() {
        $variable = 'queryAuthor';
        $stmt = $this->queries->findAllwithClause($variable);
        return [
            'templates' => 'dashboard.html.php',
            'title' => 'Dashboard',
            'variables' => ['stmt' => $stmt]
        ];
    }
    

    public function createQuery(){

        return [
            'templates' => 'createQuery.html.php',
            'title' => 'Create a query',
            'variables' => []
        ];
    }



    public function createQuerySubmit(){

        $random_string = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
    

    $stmt = ['urn' => $random_string,
    'title' => $_POST['title'],
    'date' => $_POST['date'],
    'status' => 'Submitted',
    'notes' => '',
    'category' => $_POST['category'],
    'description' => $_POST['description'],
    'casehandler' => '',
    'assigner' => '',
    'queryAuthor' => $_SESSION['userId']];

    $success = $this->queries->insert($stmt);

    $querySubmited = 'Your query has been submitted';



        return [
            'templates' => 'createQuery.html.php',
            'title' => 'Create a Query',
            'variables' => ['success' => $success, 'querySubmited' => $querySubmited]
        ];
    }

    public function viewInprocessQuerys(){
        $variable1 = 'status';
        $value1 = 'In process';
        $variable2 = 'queryAuthor';
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
        $variable2 = 'queryAuthor';
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
        $variable2 = 'queryAuthor';
        $value2 = $_SESSION['userId'];
        $stmt = $this->queries->findRowsAndColumns($variable1, $value1, $variable2, $value2);
    

    
        return [
            'templates' => 'tableQueries.html.php',
            'title' => 'view in-process querys',
            'variables' => ['stmt' => $stmt]
        ];
    }

    public function viewAllQueries(){

        $variable2 = 'queryAuthor';

        $stmt = $this->queries->findAllwithClause($variable2);
    

    
        return [
            'templates' => 'tableQueries.html.php',
            'title' => 'view in-process querys',
            'variables' => ['stmt' => $stmt]
        ];
    }


}