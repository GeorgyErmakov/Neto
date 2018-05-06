<?php
session_start();
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	header("Location: test.php"."?test_id=".$_POST['testid']);
}

echo '<html>';
$data = getTests();
echo '<h2>Список доступных тестов</h2>';
echo '<form action="" method="POST" >';
echo '<ul style="list-style-type: none">';
    if (count($data)) {
        foreach ($data as $i) {
            echo '<li>'.'<label><input name="testid" type="radio" value="'. $i['testid'].'">'.$i['testname'].'</label>'.'</li>';
        }
    }  
echo '</ul>';
echo  '<br/> <button name="testgo" type="submit" value="testgo">Пройти тест</button>';
echo '</form></html>';
?>