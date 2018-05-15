<html>
  <head>
    <meta charset="UTF-8">
    <style>
      table { 
        border-spacing: 0;
        border-collapse: collapse;
      }
      table td, table th {
        border: 1px solid #ccc;
        padding: 5px;
      }
      table th {
        background: #eee;
      }
    </style>
  </head>

  <body>
<h2>Создайте базу данных</h2>
  	<form method="POST">
    <input type="text" name="DB" placeholder="Название базы данных" />
    <input type="text" name="admin" placeholder="Администратор" />
    <input type="password" name="passadmin" placeholder="пароль администратора" />
    <input type="text" name="dbuser" placeholder="пользователь" />
    <input type="password" name="passuser" placeholder="пароль" />
    <input type="submit" name="sign_in" value="Создать" />
    </form>

<h2>Список баз данных</h2>
<?php

session_start();
require 'functions.php';

showDB();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    createDB($_POST['DB'], $_POST['admin'], $_POST['passadmin'], $_POST['dbuser'], $_POST['passuser']);
}

if (isset($_GET['db'])) {
    showTables($_GET['db']);
}

if (isset($_GET['table']) && isset($_GET['db'])) {
    descTables($_GET['db'], $_GET['table']);

}
?>
  </body>
</html>
