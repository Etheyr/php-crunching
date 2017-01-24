<?php 


$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\n", $string);
$stringW = array();
$w = "w";

foreach ($dico as $string) {

	if (strpos($string , $w) !== false) {

		array_push($stringW, $string);

	}
}

echo "<h1>".count($stringW)."</h1>"; 





?>