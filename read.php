<?php

$file = "1.txt";

if ($handle = fopen($file, 'r')){

 echo $content = fread($handle, filesize($file));

fclose($handle);

}else {
    echo "ERROR";
}