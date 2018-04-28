<?php

    session_start();
    require 'functions.php';

    if ($_POST['testgo']=="testgo"){
    	header("Location: test.php"."?test_id=".$_POST['testid']);
    	echo "string";
    }
    
    if ($_POST['testdel']=="testdel"){
        delTest($_POST['testid']);
        header("Location: index.php");
        echo "string";
    }
    
    if ($_POST['logout']=="logout"){
        logout();
    }
    

    if ($_POST['backindex']=="backindex"){
        header("Location: index.php");
    }

?>
