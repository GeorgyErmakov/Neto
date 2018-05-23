<?php

$pdo_db = "mysql:host=localhost;dbname=germakov;charset=UTF8";
$pdo_user = "germakov";
$pdo_pw = "neto1723";


require_once './Twig/Autoloader.php';
Twig_Autoloader::register();

function login($login, $password) {
    $pdo = new PDO($GLOBALS['pdo_db'], $GLOBALS['pdo_user'], $GLOBALS['pdo_pw']);
    $log = 'SELECT password from user WHERE login="'.$login.'"';
    //echo $log;
    foreach ($pdo->query($log) as $row)
    {
        if ($row['password'] == $password) {
            $pdo = null;
            return true;
        } else {
             $pdo = null;
            return false;
        }
    }    
}

function clean($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    
    return $value;
}

function addUser($login, $password)
{
    $pdo = new PDO($GLOBALS['pdo_db'], $GLOBALS['pdo_user'], $GLOBALS['pdo_pw']);
    $log = 'SELECT password from user WHERE login="'.$login.'"';
    $stmt = $pdo->prepare($log);
    $stmt->execute();
    $res = $stmt->fetchAll();
    if (!count($res)) {
    $pdo = new PDO($GLOBALS['pdo_db'], $GLOBALS['pdo_user'], $GLOBALS['pdo_pw']); 
    $insert = 'INSERT INTO user (login, password)
VALUES ("'.$login.'","'.$password.'")';
    $stmt = $pdo->prepare($insert);
    $stmt->execute();
    //$pdo = null;
    echo "Вы зарегистрированы в системе, можете войти";
    } else {
        echo "Такой пользователь уже существует";
    }
    $pdo = null;
}

function getTODOList($bool)
{  

    $params = null;
    $fieldPlaceholder = "Задача";
    $fieldValue = "";
    $submitValue = 'Добавить задание';
    $loader = new Twig_Loader_Filesystem('./templates');
    $twig = new Twig_Environment($loader, array('cache' => './tmp/cache','auto_reload' => true,));
    $template = $twig->loadTemplate('index.templ');
    $pdo = new PDO($GLOBALS['pdo_db'], $GLOBALS['pdo_user'], $GLOBALS['pdo_pw']);
    


        $sqlown = 'SELECT task.description as description, task.date_added as date_added, task.is_done as is_done, task.id as id, r.login as login_ath, ru.login as login_as from task join user r on task.user_id=r.id join user ru on task.assigned_user_id=ru.id where r.login="'.$_SESSION['login'].'"';

        $sqlassigned = 'SELECT task.description as description, task.date_added as date_added, task.is_done as is_done, task.id as id, r.login as login_ath, ru.login as login_as from task join user r on task.user_id=r.id join user ru on task.assigned_user_id=ru.id where ru.login="'.$_SESSION['login'].'" and r.login<>"'.$_SESSION['login'].'"';


        $sqluser = 'SELECT login FROM user';
$params = array(
            'users' => $pdo->query($sqluser), 
            'fieldPlaceholder' => $fieldPlaceholder,
            'fieldValue' => $fieldValue,
            'submitValue' => $submitValue,
            'lines' => $pdo->query($sqlown),
            'linesassigned' => $pdo->query($sqlassigned),
            );
        echo $twig->render('index.templ', $params);
        $pdo = null;
        
}

function getSelect() {
    $pdo = new PDO($GLOBALS['pdo_db'], $GLOBALS['pdo_user'], $GLOBALS['pdo_pw']);
    $sql = "SELECT login FROM user";
    return $pdo->query($sql);
}


function delTask()
{
    $doid=$_GET['id'];
    $pdo = new PDO($GLOBALS['pdo_db'], $GLOBALS['pdo_user'], $GLOBALS['pdo_pw']);
    $delete = 'DELETE from task WHERE id=:id';
    $stmt = $pdo->prepare($delete);
    $stmt->execute(["id"=>$doid]);
    $pdo = null;
}

function addTask()
{
    $task = $_POST["taskname"];
    //$time =NOW() 
    //date('l jS \of F Y h:i:s A');
    $pdo = new PDO($GLOBALS['pdo_db'], $GLOBALS['pdo_user'], $GLOBALS['pdo_pw']); 
    $insert = 'INSERT INTO task (description, is_done, date_added, user_id, assigned_user_id)
select :task, false, NOW(), user.id as id, user.id as id2 from user where user.login=:login';
echo $insert;
    $stmt = $pdo->prepare($insert);
    $stmt->execute(["task"=>$task,"login"=>$_SESSION['login']]);
    $pdo = null;
}

function doneTask()
{
    $doid=$_GET['id'];
    $pdo = new PDO($GLOBALS['pdo_db'], $GLOBALS['pdo_user'], $GLOBALS['pdo_pw']);
    $delete = 'UPDATE task set is_done = true WHERE id=:id';
    $stmt = $pdo->prepare($delete);
    $stmt->execute(["id"=>$doid]);
    $pdo = null;
}

function editTask()
{
    $doid=$_GET['id'];
    $pdo = new PDO($GLOBALS['pdo_db'], $GLOBALS['pdo_user'], $GLOBALS['pdo_pw']);
    $delete = 'UPDATE task set is_done = true WHERE id=:id';
    $stmt = $pdo->prepare($delete);
    $stmt->execute(["id"=>$doid]);
    $pdo = null;
}


function assignTask($assigned)
{
    $doid=$_POST['task_id'];
    $pdo = new PDO($GLOBALS['pdo_db'], $GLOBALS['pdo_user'], $GLOBALS['pdo_pw']);
    $delete = 'UPDATE task set assigned_user_id = (select id from user where login = :assigned) WHERE id=:id';
    $stmt = $pdo->prepare($delete);
    $stmt->execute(["id"=>$doid, "assigned"=>$assigned]);
    $pdo = null;
}

function updateTask()
{
    $task = $_POST["taskname"];
    $doid=$_GET['id'];
    echo $task.$doid;
    $pdo = new PDO($GLOBALS['pdo_db'], $GLOBALS['pdo_user'], $GLOBALS['pdo_pw']);
    $update = 'UPDATE tasks set description =:descr WHERE id=:id';
    echo $update;
    $stmt = $pdo->prepare($update);
    $stmt->execute(["id"=>$doid, "descr"=>$task]);
    $pdo = null;
}

function logout(){
session_destroy();
header("Location: ./login.php");
}
?>
