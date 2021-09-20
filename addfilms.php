<?php
	$author_name = "Karl Voldemar Palm";	
	require_once("../../config_vp_s2021.php");
	//echo $server_host;
	require_once("fnc_film.php");
	if(isset($_POST["film_submit"])){
		if(!empty($_POST["title_input"]) and !empty($_POST["genre_input"]) and !empty($_POST["studio_input"]) and !empty($_POST["director_input"])){
			$film_store_notice= store_film($_POST["title_input"], $_POST["year_input"], $_POST["duration_input"], $_POST["genre_input"], $_POST["studio_input"], $_POST["director_input"]);
		} else {
			$film_store_notice="Osa andmeid puudub!";
		}
		
	}
	
	
	
?>

<!DOCTYPE html> 


<html> 
<html lang="et"> 
<head> 
	<meta charset="utf-8"> 
	<title><?php echo $author_name; ?>, veebiprogrameerimine</title> 
</head>

<body> 
	<h1><?php echo $author_name; ?>, veebiprogrameerimine</h1> 
	<p>See leht on valminud õppetöö raames, ei sisalda mingit sisu!</p> 
	<p>Õppetöö toimus <a href="http://www.tlu.ee/dt">Tallinna Ülikooli digithnoloogiate instituudis</a>.</p> 
	<hr>
	<h2> Eesti filmide lisamine andmebaasi </h2>
	<form method="POST">
		<label for="title_input">Filmi pealkiri</label>
		<input type="text" name="title_input" id="title_input" placeholder="filmi pealkiri">
		<br>
		<label for="year_input">Valmimisaasta</label>
		<input type="number" name="year_input" id="year_input" min="1912" placeholder="2021">
		<br>
		<label for="duration_input">Filmi pikkus</label>
		<input type="number" name="duration_input" id="duration_input" min="1" value="60" max="600">
		<br>
		<label for="genre_input">Filmi Žanr</label>
		<input type="text" name="genre_input" id="genre_input" placeholder="filmi žanr">
		<br>
		<label for="studio_input">Filmi Tootja</label>
		<input type="text" name="studio_input" id="studio_input" placeholder="filmi tootja">
		<br>
		<label for="director_input">Filmi Rešisöör</label>
		<input type="text" name="director_input" id="director_input" placeholder="filmi rešisöör">
		<br>
		<input type="submit" name="film_submit" value="Salvesta">
	</form>
	<span><?php echo $film_store_notice; ?> </span>
</body>

</html>