<?php

function connectPDO(){
    return $pdo = new PDO("mysql:host=localhost;dbname=germakov;charset=UTF8", "germakov", "neto1723");
}

function createTB($tbname)
{
    $pdo = connectPDO();
    $createtb = 'CREATE TABLE '.$tbname.' ( idz int NOT NULL AUTO_INCREMENT, name varchar(50) NULL, estimation float NOT NULL, budget tinyint(4) NOT NULL DEFAULT 0, PRIMARY KEY (idz) ) ENGINE=InnoDB DEFAULT CHARSET=utf8;';
                $stmt = $pdo->prepare($createtb);
                $stmt->execute();
    $pdo = null;
}


function showDB()
{
    $pdo = connectPDO();
    $showdb = 'SHOW DATABASES;';

    foreach($pdo->query($showdb) as $row) {

        echo '<a href="?db='.$row['Database'].'"">'.$row['Database'].'</a>';
        echo"<br />";
    }
    $pdo = null;
}

function showTables($dbname)
{
    $pdo = connectPDO();
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
    $pdo = connectPDO();
    $showf = 'DESCRIBE '.$table.';';
    $stmt = $pdo->prepare($showf);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo '<h2>Список полей и свойств таблицы  '.$dbname.'.'.$table.'</h2>

        <table>
        <tr>
        <th>row</th>
        <th>type</th>
        <th>Action</th>';
    foreach($res as $value) {
        echo '<tr><form method="POST"><td><input type="hidden" name="tb" value='.$table.'><input type="hidden" name="fieldold" value='.$value['Field'].'><input name="field" value='.$value['Field'].'></td><td><input name="type" value='.$value['Type'].'></td><td> <input type="submit" name="change" value="Изменить" /><input type="submit" name="del" value="Удалить" /></td></form></tr>';
        }
        echo '</table>';
    $pdo = null;
}



function chField($table, $name,$newname,$type)
{
    $pdo = connectPDO();
    $ch = 'ALTER TABLE '.$table.' CHANGE '.$name.' '.$newname.' '. $type.';';
    $stmt = $pdo->prepare($ch);
    $stmt->execute();
    $pdo = null;
}


function delField($table, $name)
{
    $pdo = connectPDO();
    $ch = 'ALTER TABLE '.$table.' DROP COLUMN '.$name.';';
    $stmt = $pdo->prepare($ch);
    $stmt->execute();
    $pdo = null;
}

?>
