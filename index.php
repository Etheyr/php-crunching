<?php 


$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\n", $string);
$stringCount15 =array();



foreach ($dico as $string) {
	if (strlen($string) == 15) {
		array_push($stringCount15, $string);
	}
}

echo "<h1>".count($stringCount15)."</h1>"; 





?>