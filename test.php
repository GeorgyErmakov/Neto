<html>
<head>
    <title>Страница теста</title>
</head>
<?php
session_start();
require 'functions.php';
  $testid=$_GET['test_id'];
  $json=file_get_contents($_SERVER['DOCUMENT_ROOT']. '/quationarie-file.json');
  $data =  json_decode($json,true);

      if (empty($_GET['test_id'])) {
          http_response_code(404);
          echo 'Cтраница не найдена! 404';
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

 if (count($var)) {

echo '<h1>Прохождение теста "'. $testname .'" <br/></h1>';
echo '<form action="result.php" method="POST">';
            foreach ($var as $i) {
            	echo "<p>".$i['q']."</p>";
                 for ($s=0; $s<count($i['var']);$s++)
               {
                echo '<label><input name="'.$i['id'].'" type="radio" value='. $i['var'][$s].'>'.$i['var'][$s].'</label>'; 
            }
        }
            echo  '<br/> <button name="testit" type="submit" value="testit">Проверить</button>';
            echo '</form>';
        }

            echo '<form action="action.php" method="POST">';
            echo  '<br/> <button name="logout" type="submit" value="logout">Выйти</button>';
            echo  '<br/> <button name="backindex" type="submit" value="backindex">Вернуться на главную</button>';
            echo '</form>';
            
  ?>
</html>