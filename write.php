<?php

$file = "1.txt";

if ($handle = fopen($file, 'w')){

    fwrite($handle, "Good Afternoon \n Mann");

fclose($handle);

}else {
    echo "ERROR";
}