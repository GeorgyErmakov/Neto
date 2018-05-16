<?php

session_start();
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
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

<html>
<head>
	<style type="text/css">
    form {
	    display: inline-block;
      width: 50%;
      margin: 0 auto;
      padding-top: 20px;
    }
  </style>
</head>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

<body>



<p>Введите данные для регистрации или войдите, если уже регистрировались:</p>

<form method="POST">
    <input type="text" name="login" placeholder="Логин" />
    <input type="password" name="password" placeholder="Пароль" />
    <input type="submit" name="sign_in" value="Вход" />
    <input type="submit" name="register" value="Регистрация" />
</form>

</body>
</html>



