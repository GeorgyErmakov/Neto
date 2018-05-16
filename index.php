<?php

session_start();
require 'functions.php';

$fieldPlaceholder = "Задача";
$fieldValue = "";
$submitValue = 'Добавить задание';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST["taskname"])) {
    if ($_GET['action'] == 'edit'){
        updateTask();
        header("Location: ./index.php");
    } else {
      addTask();
      header("Location: ./index.php");
    }

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
   // header("Location: ./index.php");
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

?>

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
    <form method="POST">
      <?php 
      echo '<input type="text" name="taskname" placeholder="'.$fieldPlaceholder.'" value="'.$fieldValue.'"/>';
      echo '<input type="submit" value="'.$submitValue.'" />';
      ?>
    </form>

    <h2>Эти дела создал ты</h2>
    <table>
      <tr>
        <th>Задача</th>
        <th>Статус</th>
        <th>Дата создания</th>
        <th>Автор</th>
        <th>Ответственный</th>
        <th>Действия</th>
        <th>Назначить ответств.</th>
      </tr>
      <?php
          getTODOList(true);
      ?>
    </table>

        <h2>Это тебе надо сделать</h2>
    <table>
      <tr>
        <th>Задача</th>
        <th>Статус</th>
        <th>Дата</th>
        <th>Автор</th>
        <th>Ответственный</th>
        <th>Действия</th>
      </tr>
      <?php
          getTODOList(false);
      ?>
    </table>
  </body>
</html>