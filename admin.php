<?php
session_start();
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(isset($_FILES)) { 

        if (move_uploaded_file($_FILES['filename']['tmp_name'],'./'.$_FILES['filename']['name'])) { 
            addTest('./'.$_FILES['filename']['name']);
            echo 'Файл с тестами успешно загружен'; 
        } else {
            echo 'Файл с тестами не загружен, извините'; // Оповещаем пользователя о том, что файл не был загружен
        }
        
    } else {
        header("Отказано в доступе");
    }
}

echo '<h2>Форма для загрузки файлов</h2>
     <form action="" method="post" enctype="multipart/form-data">
     <input type="file" name="filename"><br>
     <input type="submit" value="Загрузить"><br>
     </form>';
?>