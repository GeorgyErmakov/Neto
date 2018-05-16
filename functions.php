<?php

function login($login, $password) {
    $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723");
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
    $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723");
    $log = 'SELECT password from user WHERE login="'.$login.'"';
    if (count($pdo->query($log))) {
    $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723"); 
    $insert = 'INSERT INTO user (login, password)
VALUES ("'.$login.'","'.$password.'")';
    $stmt = $pdo->prepare($insert);
    $stmt->execute();
    $pdo = null;
    echo "Вы зарегистрированы в системе, можете войти";
    } else {
        echo "Такой пользователь уже существует";
    }
    $pdo = null;
}

function getTODOList($bool)
{  
    $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723");
    
    if ($bool) {

        $sql = 'SELECT task.description as description, task.date_added as date_added, task.is_done as is_done, task.id as id, r.login as login_ath, ru.login as login_as from task join user r on task.user_id=r.id join user ru on task.assigned_user_id=ru.id where r.login="'.$_SESSION['login'].'"';
    } else {
      $sql = 'SELECT task.description as description, task.date_added as date_added, task.is_done as is_done, task.id as id, r.login as login_ath, ru.login as login_as from task join user r on task.user_id=r.id join user ru on task.assigned_user_id=ru.id where ru.login="'.$_SESSION['login'].'"';

    }
        foreach($pdo->query($sql) as $row) 
        {
            if ($row['is_done']) {
                $status = 'Выполнено';
            } else {
                $status = 'Не выполнено';
            }

           if ($bool) {
            echo '<tr><form method="POST"><td><input type="hidden" name="task_id" value='.$row['id'].'>'.$row['description'].'</td>'.'<td>'.$status.'</td><td>'.$row['date_added'].'</td><td>'.$row['login_ath'].'</td><td>'.$row['login_as'].'</td><td><a href="?id='.$row['id'].'&action=delete">Удалить</a> / <a href="?id='.$row['id'].'&action=done">Выполнить</a> / <a href="?id='.$row['id'].'&action=edit">Изменить</a><td>'.getSelect().
'<input type="submit" name="change_issigne" value="Изменить" /></td></form></tr>';
           } else {
                echo '<tr><td>'.$row['description'].'</td>'.'<td>'.$status.'</td><td>'.$row['date_added'].'</td><td>'.$row['login_ath'].'</td><td>'.$row['login_as'].'</td><td><a href="?id='.$row['id'].'&action=done">Выполнить</a> / <a href="?id='.$row['id'].'&action=edit">Изменить</a></td></tr>';
           }
        }
        $pdo = null;
}

function getSelect() {
    $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723");
    $sql = "SELECT login FROM user";
    $str = '';
    //$result_select = mysql_query($sql);
    $str = $str.'<select name="assigned_user">';
    foreach($pdo->query($sql) as $row){

    $str = $str.'<option value = '.$row['login'].' > '.$row['login'].' </option>';

    }

    $str = $str. '</select>';
    return $str;
}


function delTask()
{
    $doid=$_GET['id'];
    $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723");
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
    $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723"); 
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
    $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723");
    $delete = 'UPDATE task set is_done = true WHERE id=:id';
    $stmt = $pdo->prepare($delete);
    $stmt->execute(["id"=>$doid]);
    $pdo = null;
}

function editTask()
{
    $doid=$_GET['id'];
    $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723");
    $delete = 'UPDATE task set is_done = true WHERE id=:id';
    $stmt = $pdo->prepare($delete);
    $stmt->execute(["id"=>$doid]);
    $pdo = null;
}


function assignTask($assigned)
{
    $doid=$_POST['task_id'];
    $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723");
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
    $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723");
    $update = 'UPDATE tasks set description =:descr WHERE id=:id';
    echo $update;
    $stmt = $pdo->prepare($update);
    $stmt->execute(["id"=>$doid, "descr"=>$task]);
    $pdo = null;
}
?>
