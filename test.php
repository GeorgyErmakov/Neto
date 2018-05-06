<?php
session_start();
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (runTest()) {
        echo 'Вы успешно прошли тест!';
    } else {
          echo 'Жаль, но Вы не верно ответили на вопросы. Пройдите тест еще раз';
    }
}
 
$testid=$_GET['test_id'];
$data =  getTests();
      
if (!findTest($testid)) {
    http_response_code(404);
    echo 'Извините, этот тест не найден';
    exit(1);
}

if (count($data)) {
    foreach ($data as $i) {
        if($i['testid']==$testid) {
            $var=$i['QU'];
            $id=$i['testid'];
            $testname=$i['testname'];             
        }
    }
    $_SESSION['test']['name']=$testname;
    $_SESSION['test']['id']=$testid;  
}

echo '<html>
    <head>
    <title>Страница теста</title>
    </head>';

if (count($var)) {
    echo '<h1>Прохождение теста "'. $testname .'" <br/></h1>';
    echo '<form action="" method="POST">';
    foreach ($var as $i) {
        echo "<p>".$i['q']."</p><ul>";
            for ($s=0; $s<count($i['var']);$s++) {
                echo '<li><label><input name="'.$i['id'].'" type="radio" value='. $i['var'][$s].'>'.$i['var'][$s].'</label></li>'; 
            }
        echo '</ul>';    
    }
    echo  '<br/> <button name="testit" type="submit" value="testit">Проверить</button>';
    echo '</form></html>';
}         
?>