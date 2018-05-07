<?php

function getTODOList()
{
    
    $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723");
    $sql = 'SELECT * from tasks';
    foreach($pdo->query($sql) as $row) 
    {
        if ($row['is_done']) {
            $status = 'Выполнено';
        } else {
            $status = 'Не выполнено';
        }
        echo '<tr><td>'.$row['description'].'</td>'.'<td>'.$status.'</td><td>'.$row['date_added'].'</td><td><a href="?id='.$row['id'].'&action=delete">Удалить</a> / <a href="?id='.$row['id'].'&action=done">Выполнить</a> / <a href="?id='.$row['id'].'&action=edit">Изменить</a></td></tr>';
    }
    $pdo = null;
}

function delTask()
{
    $doid=$_GET['id'];
    $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723");
    $delete = 'DELETE from tasks WHERE id=:id';
    $stmt = $pdo->prepare($delete);
    $stmt->execute(["id"=>$doid]);
    $pdo = null;
}

function addTask()
{
    $task = $_POST["task"];
    $time = date('l jS \of F Y h:i:s A');
    $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723"); 
    $insert = 'INSERT INTO tasks (description, is_done, date_added)
VALUES ("'.$task.'", false, NOW())';
    $stmt = $pdo->prepare($insert);
    $stmt->execute();
    $pdo = null;
}

function doneTask()
{
    $doid=$_GET['id'];
    $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723");
    $delete = 'UPDATE tasks set is_done = true WHERE id=:id';
    $stmt = $pdo->prepare($delete);
    $stmt->execute(["id"=>$doid]);
    $pdo = null;
}

function editTask()
{
    $doid=$_GET['id'];
    $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723");
    $delete = 'UPDATE tasks set is_done = true WHERE id=:id';
    $stmt = $pdo->prepare($delete);
    $stmt->execute(["id"=>$doid]);
    $pdo = null;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST["task"])) {
    addTask();
}

if(isset($_GET['id']) && $_GET['action'] == 'delete') {
    delTask();
}

if(isset($_GET['id']) && $_GET['action'] == 'done') {
    doneTask();
}

if(isset($_GET['id']) && $_GET['action'] == 'edit') {
    
    $doid=$_GET['id'];
    $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723");
    $curtask = 'SELECT description FROM tasks WHERE id=:id';
    $stmt = $pdo->prepare($curtask);
    $stmt->execute(["id"=>$doid]);
    $data = $stmt->fetch();
    $pdo = null;
    $fieldValue = $data;
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
      <? echo '<input type="text" name="task" placeholder="'.$fieldPlaceholder.'" value="'.$fieldValue.'" />';?>
      <input type="submit" value="Внести задание" />
    </form>
    <h1>Список дел</h1>
    <table>
      <tr>
        <th>Задача</th>
        <th>Статус</th>
        <th>Выполнить к</th>
        <th>Действия</th>
      </tr>
      <?php
          getTODOList();
      ?>
    </table>
  </body>
</html>