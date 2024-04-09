<?php
$key = $_GET['key'];

$fp = fopen("../data/".$key,"r");
echo fgets($fp);
fclose($fp);