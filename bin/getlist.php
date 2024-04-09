<?php
// $getdata=$_POST['data'];
// echo "This message send from server....\n";
// echo $getdata."\n";

$fp1 = fopen("../data/list.dat", "r");
// $fp2 = fopen("../list2.dat","r");
// while($line = fgets($fp1)){
// 	echo '<option value="'.fgets($fp2).'">'.$line.'</option>';
// }
$jsontext = fgets($fp1);
fclose($fp1);
$jsondata = json_decode($jsontext, true);
if (!empty($jsondata)) {
	foreach (array_keys($jsondata) as $data) {
		echo '<option value="' . $data . '">' . $jsondata[$data] . '</option>';
	}
} else {
		 echo "This message from server.\n";
}
