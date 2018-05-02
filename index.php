<?php

function myAutoload($classNameWithNamespace)
{
$pathToFile = $_SERVER['DOCUMENT_ROOT']. str_replace('\\', DIRECTORY_SEPARATOR, $classNameWithNameSpace. '.php';
if (file_exists($pathToFile)) {
include "$pathToFile";
}

$toy = new ToyClass('1', 'Погремушка', '100');
//$art = new products\kidsartsprod ArtClass(1, 'Альбом', 150);
//$food = new products\kidsfoodsprod KidsFoodClass(1, 'Пюре', 350);

?>
