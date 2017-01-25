
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
	<title>Php Crunching</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.6/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<table class="ui inverted celled table">

		<br>

		<h1 id="titre">Php Crunching</h1>

		<br>

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
			<th><h2>1</h2></th>
			<th><h2>2</h2></th>
			<th><h2>3</h2></th>
			<th><h2>4</h2></th>
			<th><h2>5</h2></th>
			<th><h2>6</h2></th>
			<th><h2>7</h2></th>
			<th><h2>8</h2></th>
			<th><h2>9</h2></th>
			<th><h2>10</h2></th>
		</tr>
		<tr>
			<?php for ($i = 0; $i < 10; $i++) { ?>
				<td><h3><?php echo $top[$i]['im:name']['label'];?></h3></td>
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
						<td><h3><?php echo array_search($value, $top)+1;?></h3></td>
					</tr>

					<?php
				} endforeach;
				?>

			</table>



			<table class="ui inverted celled table">

				<tr>
					<th><h1>Le réalisateur de « The LEGO Movie »</h1></th>
				</tr>
				<?php
				foreach($top as $value):
					if($value['im:name']['label'] === 'The LEGO Movie'){

						?>

						<tr>
							
							<td><h3><?php echo $value['im:artist']['label'];?></h3></td>

						</tr>

						<?php
					} endforeach;
					?>

				</table>


				<table class="ui inverted celled table">

					<tr>
						<th><h1>Combien de film sont sortie avant l'année 2000</h1></th>
					</tr>
					<?php
					$count=0;
					foreach($top as $value){
						$releaseDate = $value['im:releaseDate']['label'];

						$stroRelease = strtotime($releaseDate);
						$stroTime = strtotime('2000-00-00');

						if ($stroRelease < $stroTime) {
							$count++;
						}
					}
					?>
					
					<tr>

						<td><h3><?php echo $count ;?></h3></td>

					</tr>


				</table>

				
				<table class="ui inverted celled table">

					<tr>
						<th><h1>Combien de film sont sortie avant l'année 2000</h1></th>
					</tr>
					<?php
					$count=0;
					foreach($top as $value){
						$releaseDate = $value['im:releaseDate']['label'];

						$stroRelease = strtotime($releaseDate);
						$stroTime = strtotime('2000-00-00');

						if ($stroRelease < $stroTime) {
							$count++;
						}
					}
					?>
					
					<tr>

						<td><h3><?php echo $count ;?></h3></td>

					</tr>


				</table>



			</body>
			</html>