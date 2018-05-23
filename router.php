<?php
include 'controller.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST["taskname"])) {


    if ($_GET['action'] == 'edit'){
        updateTask();
        header("Location: ./index.php");
    } else {

      addTask();
      header("Location: ./index.php");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["logout"])) {
      logout();
}

if(isset($_GET['id']) && $_GET['action'] == 'delete') {
    delTask();
    header("Location: ./index.php");
}

if(isset($_GET['id']) && $_GET['action'] == 'done') {
    doneTask();
    header("Location: ./index.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    assignTask($_POST['assigned_user']);
    header("Location: ./index.php");
}

if(isset($_GET['id']) && $_GET['action'] == 'edit') {
    
    $submitValue = "Обновить задание";
    $doid=$_GET['id'];
    $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723");
    $curtask = 'SELECT description FROM tasks WHERE id=:id';
    $stmt = $pdo->prepare($curtask);
    $stmt->execute(["id"=>$doid]);
    $data = $stmt->fetch();
    $pdo = null;
    $fieldValue = $data['description']; 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["sign_in"])||isset($_POST['register']) ){
	  $login=$_POST['login'];
    $pw=$_POST['password'];
    
    if (login($login,$pw)) {
      $_SESSION['login']=$login;
      header("Location: index.php");
      
    }
	  else {
		    if (isset($_POST['login']) && isset($_POST['register'])) {
          addUser($login, $pw);
		    } 
        else {
            echo '<p>Логин или пароль неверны!</p>';
        }
	  }
}

?>