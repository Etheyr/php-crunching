<?php 


$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\n", $string);
$stringQ = array();
$q = "q";

foreach ($dico as $string) {

	if (substr($string , -1) == $q) {

		array_push($stringQ, $string);

	}
}

echo "<h1>".count($stringQ)."</h1>"; 





?>