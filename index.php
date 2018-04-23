<?php
session_start();
require 'functions.php';
if ($_SESSION['user']['role']<>'admin') {
	echo "<h1>Здравствуйте, ".$_SESSION['user']['name']."! Вы вошли в систему как гость. Вам доступны тесты для их прохождения. Удачи!</h1>";
	getTestList();

} else {
	    echo "<h1>Здравствуйте, " .$_SESSION['user']['name']."! Вам доступны тесты для прохождения и все возможности для их редактирования.</h1>";
        getTestList(); 
}

?>