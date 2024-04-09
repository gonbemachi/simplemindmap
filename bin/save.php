<?php
//$getdata = $_POST['text'];
//先頭の本文を取得しMD5でハッシュ化してファイル名にする。
$data = json_decode(file_get_contents('php://input'), true);
if(empty($data[0]['text'])){
    exit;
}
$filename = md5($data[0]['text']);
$fp = fopen('../data/'.$filename,"w");
// fwrite($fp,print_r($data,true));
fwrite($fp,file_get_contents('php://input'));
fclose($fp);
// echo $filename;

$fp = fopen("../data/list.dat","r");
// $fp2 = fopen("../list2.dat","r");
// while($line = fgets($fp1)){
// 	echo '<option value="'.fgets($fp2).'">'.$line.'</option>';
// }
$jsontext = fgets($fp);
fclose($fp);
$jsondata = json_decode( $jsontext , true );
$jsondata[$filename] = mb_substr($data[0]['text'],0,10);

$fp2= fopen("../data/list.dat","w");
fwrite($fp2,json_encode($jsondata));
fclose($fp2);

var_dump($jsondata);