<?php
	$author_name = "Karl Voldemar Palm";	
	require_once("../../config_vp_s2021.php");
	//echo $server_host;
	require_once("fnc_film.php");
	$films_html = null;
	$films_html = read_all_films();
	
	
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
	<h2> Eesti filmid </h2>
	<?php echo $films_html; ?>
</body>

</html>