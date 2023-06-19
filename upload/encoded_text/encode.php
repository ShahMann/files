<?php

include "upload.php";

function encode(){
global $encodedFile; 
echo $encodedFile;
$file = $_POST['name'] . ".txt";
    $handle = fopen($file, 'x+');
    if ($handle = fopen($file, 'w')){
    fwrite($handle, $encodedFile);
    fclose($handle);
    }
}