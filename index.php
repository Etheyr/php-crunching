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
?>



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
?>



<?php
$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\n", $string);
$stringCount15 =array();

foreach ($dico as $string) {
	if (strlen($string) == 15) {
		array_push($stringCount15, $string);
	}
}
?>



<?php 
$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
$brut = json_decode($string, true);
$top = $brut["feed"]["entry"]; # liste de films
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.6/semantic.min.css">
</head>
<body>
	<table class="ui inverted celled table">

		<tr>
			<th><h1>Nombre & Dictionnaire</h1></th>
		</tr>

		<tr>
			<td><h2>Tous les mots qui commence par W</h2><?="<h3>".count($stringW)."</h3>"?></td>
			<td><h2>Tous les mots qui finissent par Q</h2><?="<h3>".count($stringQ)."</h3>"?></td>
		</tr>

		<tr>
			<td><h2>Tous les mots avec 15 caractères </h2><?="<h3>".count($stringCount15)."</h3>"?></td>
			<td><h2>Tous les mots du dictionnaire</h2><?="<h3>".count($dico)."</h3>";?></td>
		</tr>

	</table>

	<table class="ui inverted celled table">

		<tr>
			<th><h1>Top Films</h1></th>
		</tr>
		<tr>
			<?php for ($i = 0; $i < 10; $i++) { ?>
				<td><?php echo $top[$i]['im:name']['label'];?></td>
				<?php } ?>
			</tr>
		</table>

		<table class="ui inverted celled table">

			<tr>
				<th><h1>Le classement de Gravity</h1></th>
			</tr>

			<?php 
			foreach($top as $value):
				if($value['im:name']['label'] === 'Gravity'){
					
					?>

					<tr>
						<td><h2><?php echo array_search($value, $top)+1;?></h2></td>
					</tr>

					<?php
				} endforeach;
				?>

			</table>


		</body>
		</html>