<?php
session_start();
require 'functions.php';

if(isset($_FILES)) { 
    if($_SESSION['user']['role']=='admin') {
        if (move_uploaded_file($_FILES['filename']['tmp_name'],'./'.$_FILES['filename']['name'])) { 
            echo 'File Uploaded'; 
        }
        else {
            echo 'No File Uploaded'; // Оповещаем пользователя о том, что файл не был загружен
        }
        addTest('./'.$_FILES['filename']['name']);
        header("Location: index.php");
    }
    else {
        header("HTTP/1.1 403 Forbidden");
    }
}
?>
