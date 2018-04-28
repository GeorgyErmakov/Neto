<?php
session_start();

function getusers() {
    $json=file_get_contents('./users.json');
    $data =  json_decode($json,true);
    return $data;
}

function getuser($login) {
	$users= getusers();
	foreach ($users as $user) {
	    if($user['login']==$login) {
            return $user;
        }
	}
	return null;
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
    $json=file_get_contents('./quationarie-file.json');
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
    if ($_SESSION['user']['role']=='admin') {
    echo  '<h2>Форма для загрузки файлов</h2>
    <form action="up.php" method="post" enctype="multipart/form-data">
        <input type="file" name="filename"><br>
        <input type="submit" value="Загрузить"><br>
    </form>';
    }
}


function getTests() {

$json=file_get_contents('./quationarie-file.json');
$data =  json_decode($json,true);
return $data;
}

function findTest($testid) {

$tests=getTests();
if(count($tests)) {
    foreach ($tests as $i) {
        if($i['testid']==$testid) {
        return true; exit(1);            
        }
    }
}
return false;
}

function delTest($testid) {
	$json=file_get_contents('./quationarie-file.json');
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
	
	if (file_exists('./quationarie-file.json')){
        $json=file_get_contents('./quationarie-file.json');
        $data =  json_decode($json,true);
        $jsonnew=file_get_contents($filetest);
        $datanew=json_decode($jsonnew,true);
        if(count($data)) {
            $merge=array_merge($data,$datanew);
        }
        else {
            $merge=$datanew;
        }
       file_put_contents('./quationarie-file.json',json_encode($merge));
	}
    else {
        rename ($filetest,'./quationarie-file.json');
    }
}

function logout() {
    session_destroy();
    header("Location: login.php");
}

function runTest() {

    $tests=getTests();

    if (count($tests)) {
        foreach ($tests as $i) {
            if($i['testid']==$_SESSION['test']['id']) {
                $var=$i['QU'];
                $testname=$i['testname'];
            }
        }
    }

    $arrayobj = new ArrayObject($_POST);
    foreach ($arrayobj as $key => $value) {
        foreach($var as $item) {
        if ($key==$item['id']) { 
            if ($item['correct']<>$value) { 
               
                unset($_SESSION['test']['name']);
                unset($_SESSION['test']['id']);
                return false;
            }
        }
        }
    }
    return true;
}

function getCertificate() {
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
}
?>
