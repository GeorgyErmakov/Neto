<?php

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
?>