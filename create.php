<?php

$file = "4.txt";

$handle = fopen($file, 'x+');

fclose($handle);