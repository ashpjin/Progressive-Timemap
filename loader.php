<?php

include_once('db_accessor.php');

// get timestamps
$start = strtotime($_GET['start']);
$end = strtotime($_GET['end']);
$cb = $_GET['callback'];

// start data
echo "$cb([";

$db = new phpToJs('localhost', 'root', 'adam17', 'twitter');
$res = $db->getTweetsInInterval($start, $end);

$index = 0;
while($db_field = mysql_fetch_assoc($res)){
	if($index) echo ',';
	echo '{';
        echo 'title:"' . addslashes($db_field['message_text_clean']) . '",';
        echo 'start:"' . date("Y-m-d", $db_field['created']) . '",';
        echo 'point:{lat:' . $db_field['latitude'] . ', lon: ' . $db_field['longitude'] . '},';
	if($index) echo 'options:{ noEventLoad: true}';
	else echo 'options:{ noEventLoad: false}';
        echo '}';
        $index = $index + 1;
}
echo "])";

//echo $res;

?>
