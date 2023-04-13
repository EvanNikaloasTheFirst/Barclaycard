<?php
namespace portal;
class Routes implements \as2\Routes
{

    public function getPage($route)
    {
        require '../Database.php';

        $staff = new \as2\DatabaseTable($pdo, 'queries', 'id');
        $user = new \as2\DatabaseTable($pdo, 'users', 'id');
        $queries = new \as2\DatabaseTable($pdo, 'queries', 'id');
       

        // $categoriesTable = new \as2\DatabaseTable($pdo, 'category', 'id');
       


        $controllers = [];
        $controllers['staff'] = new \portal\Controllers\Staff($staff,$queries);
        $controllers['user'] = new \portal\Controllers\User($queries,$user);
        $controllers['supervisor'] = new \portal\Controllers\Supervisor($queries,$user,$staff);
        if ($route == '') {
            $page = $controllers['user']->login();
        } else {
            list($controllerName, $functionName) = explode('/', $route);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $functionName = $functionName . 'Submit';
            }
            $controller = $controllers[$controllerName];
            $page = $controller->$functionName();
        }
        return $page;
    }

    public function getDefaultRoute()
    {
        $_SESSION['AdminLoggedIn'];
        $_SESSION['userId'];

        if($_SESSION['loggedIn'] == true ){

            header('location: /user/dashboard');
    
        }else{

            header('location: /user/login');
        }
    }




}