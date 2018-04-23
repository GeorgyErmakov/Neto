<?php
session_start();
require 'functions.php';
      $json=file_get_contents($_SERVER['DOCUMENT_ROOT']. '/quationarie-file.json');
      $data =  json_decode($json,true);
      $string = 'Поздравляем, Вы успешно прошли тест.Сертификат выдан';

if (count($data)) {
            foreach ($data as $i) {
              if($i['testid']==$_SESSION['test']['id']) {
                 $var=$i['QU'];
                 $testname=$i['testname'];

                 }
             }
        }

  $arrayobj = new ArrayObject($_POST);
    foreach ($arrayobj as $key => $value) {
     foreach($var as $item)
  {
    if ($key==$item['id']) { 
       if ($item['correct']<>$value) { echo 'Жаль, но Вы не верно ответили на вопросы. Пройдите тест еще раз'; exit(1);
          unset($_SESSION['test']['name']);
                  unset($_SESSION['test']['id']);
     }
    }
  }
 }

 header('content-type: image/png');
  $image = imagecreate(700, 700);
  $dark_grey = imagecolorallocate($image, 102, 102, 102);
  $white = imagecolorallocate($image, 255, 255, 255);
  $black = imagecolorallocate($image, 0, 0, 0);
  ImageFill($image, 0, 0, $dark_grey);
  ImageString($image , 5, 50, 350, 'Congrats!!! We issue certificate to '. $_SESSION['user']['name'], $black);
  imagepng($image);
  imagedestroy($image);

           unset($_SESSION['test']['name']);
           unset($_SESSION['test']['id']);

            echo '<form action="action.php" method="POST">';
            echo  '<br/> <button name="logout" type="submit" value="logout">Выйти</button>';
            echo  '<br/> <button name="backindex" type="submit" value="backindex">Вернуться на главную</button>';
            echo '</form>';

?>