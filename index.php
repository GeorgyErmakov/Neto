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
    <input type="text" name="TB" placeholder="Название базы данных" />
    <input type="submit" name="sign_in" value="Создать" />
    </form>

<h2>Список баз данных</h2>
<?php

session_start();
require 'functions.php';

showDB();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["TB"])) {
    createTB($_POST['TB']);
}

if (isset($_GET['db'])) {
    showTables($_GET['db']);
}

if (isset($_GET['table']) && isset($_GET['db'])) {
    descTables($_GET['db'], $_GET['table']);

}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["change"])) {
    chField($_POST["tb"], $_POST["fieldold"], $_POST["field"], $_POST["type"]);
    header("Refresh:0");

}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["del"])) {
    delField($_POST["tb"], $_POST["fieldold"]);
    header("Refresh:0");
}


?>
  </body>
</html>
