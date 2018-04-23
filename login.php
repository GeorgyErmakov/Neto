<?php
session_start();

require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$json=file_get_contents($_SERVER['DOCUMENT_ROOT']. '/json.json');
    $data =  json_decode($json,true);
	$login=clean($_POST['login']);
    $pw=clean($_POST['pw']);
    if (login($login,$pw)) {
    	header("Location: index.php");
    }
	else {
		if (isset($_POST['name'])){
            $_SESSION['user']['name']=clean($_POST['name']);
            $_SESSION['user']['role']='guest';
            header("Location: index.php");
		} else {echo '<p>Логин или пароль неверны!</p>';}
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
   }
  </style>
	</head>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

<body>
<h2>Вход на сайт тестирования</h2>
<div class="form">
	
<form class="form-horizontal" role="form" method="POST">

  <div class="form-group">

    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Логин" name="login">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" placeholder="Пароль" name="pw">
    </div>
  </div> 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default btn-sm">Авторизоваться</button>
    </div>
  </div>  
</form>
</div>
<div class="form">
		<h2>Гостевой вход</h2>
<form class="form-horizontal" role="form" method="POST">
  <div class="form-group">
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Ваше имя</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Ваше имя" name="name">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default btn-sm">Войти</button>
    </div>
  </div>  
</form>
</div>
</body>
</html>