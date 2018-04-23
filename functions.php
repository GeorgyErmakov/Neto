<?php
session_start();

function getusers() {
    $json=file_get_contents($_SERVER['DOCUMENT_ROOT']. '/json.json');
    $data =  json_decode($json,true);
    return $data;
}

function getuser($login) {
	$users= getusers();
	foreach ($users as $user) {
		if($user['login']==$login) {return $user;}
	}
	return [];
}

function login($login, $password) {
    $user = getuser($login);
    if ($user && $user['password']==$password) {
        $_SESSION['user']= $user;
    	return true;
    }
    return false;
}


function clean($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    
    return $value;
}

function getTestList(){

    $json=file_get_contents($_SERVER['DOCUMENT_ROOT'].'/quationarie-file.json');
    $data =  json_decode($json,true);
    echo '<h2>Список доступных тестов</h2>';
    echo '<form action="action.php" method="POST" >';
    echo '<ul style="list-style-type: none">';
    if (count($data)) {
        foreach ($data as $i) {
            echo '<li>'.'<label><input name="testid" type="radio" value="'. $i['testid'].'">'.$i['testname'].'</label>'.'</li>';
             }
        }
    echo '</ul>';
    echo  '<br/> <button name="testgo" type="submit" value="testgo">Пройти тест</button>';

    if ($_SESSION['user']['role']=='admin') {
	   echo  '<br/> <button name="testdel" type="submit" value="testdel">Удалить</button>';
    }
    echo  '<br/> <button name="logout" type="submit" value="logout">Выйти</button>';
    echo '</form>';
    echo  '<h2>Форма для загрузки файлов</h2>
    <form action="up.php" method="post" enctype="multipart/form-data">
        <input type="file" name="filename"><br>
        <input type="submit" value="Загрузить"><br>
    </form>';
}

function delTest($testid) {

	$json=file_get_contents($_SERVER['DOCUMENT_ROOT']. '/quationarie-file.json');
    $data =  json_decode($json,true);
    foreach ($data as $key => $value){        
        if (in_array($testid,$value)) {          
            unset($data[$key]);             
        }
    } 

    file_put_contents($_SERVER['DOCUMENT_ROOT']. '/quationarie-file.json',json_encode($data)); 
    unset($data); 
}

function addTest($filetest) {
	
	if (file_exists($_SERVER['DOCUMENT_ROOT']. '/quationarie-file.json')){
	   $json=file_get_contents($_SERVER['DOCUMENT_ROOT']. '/quationarie-file.json');
       $data =  json_decode($json,true);
       $jsonnew=file_get_contents($filetest);
       $datanew=json_decode($jsonnew,true);
       if(count($data)) {$merge=array_merge($data,$datanew);}
       else{$merge=$datanew;}
       file_put_contents($_SERVER['DOCUMENT_ROOT']. '/quationarie-file.json',json_encode($merge));
	}

else{
rename ($filetest,$_SERVER['DOCUMENT_ROOT'].'/quationarie-file.json');
}
}

function logout() {
session_destroy();
header("Location: login.php");
}

?>