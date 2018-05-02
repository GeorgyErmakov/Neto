<?php

function myAutoload($className)
{
    $pathToFile = './'. str_replace('\\', DIRECTORY_SEPARATOR, $className). '.php';
    if (file_exists($pathToFile)) {
        require "$pathToFile";
    }
}

function myAutoload2($className) 
{
    $filePath='./'.$className.'.php'; 
    if (file_exists($filePath)) { 
    	require "$filePath"; 
    } 
} 

spl_autoload_register('myAutoload'); 
spl_autoload_register('myAutoload2'); 

$toy = new Products\ToyClass('1', 'Погремушка', '100');

?>
