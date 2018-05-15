<?php

function createDB($dbname, $admin, $adminpass, $user, $userpass)
{

    $pdo = new PDO("mysql:host=localhost", $admin, $pass);
    $createdb = "CREATE DATABASE `:db`;
                CREATE USER ':admin'@'localhost' IDENTIFIED BY ':pass';
                GRANT ALL ON `:db`.* TO ':admin'@'localhost';
                FLUSH PRIVILEGES;";
                $stmt = $pdo->prepare($createdb);
                $stmt->execute(["db"=>$dbname, "admin"=>$user, "pass"=>$userpass]);
    $pdo = null;
}


function showDB()
{
    $pdo = new PDO("mysql:host=localhost", "germakov", "neto1723");
    $showdb = 'SHOW DATABASES;';

    foreach($pdo->query($showdb) as $row) {

        echo '<a href="?db='.$row['Database'].'"">'.$row['Database'].'</a>';
        echo"<br />";
    }
    $pdo = null;
}

function showTables($dbname)
{
    $connect='mysql:host=localhost;dbname='.$dbname.';charset=UTF8';
    $pdo = new PDO($connect,"germakov", "neto1723");
    $showtables = 'SHOW TABLES;';
    $stmt = $pdo->prepare($showtables);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<h2>Список таблиц базы данных '.$dbname.'</h2>';
    foreach($res as $value) {
        foreach($value as $key=>$val) {
        echo "<br />";
        echo '<a href="?table='.$val.'&db='.$dbname.'">'.$val.'</a>';
        }
        }
    $pdo = null;
}

function descTables($dbname, $table)
{
    $connect='mysql:host=localhost;dbname='.$dbname.';charset=UTF8';
    $pdo = new PDO($connect,"germakov", "neto1723");
    $showf = 'DESCRIBE '.$table.';';
    $stmt = $pdo->prepare($showf);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo '<h2>Список полей и свойств таблицы  '.$dbname.'.'.$table.'</h2>';
    foreach($res as $value) {
        echo $value['Field'].' '.$value['Type'];
        echo"<br />";
        }
    $pdo = null;
}



?>
