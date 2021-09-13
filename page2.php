<?php
	$author_name = "Karl Voldemar Palm";	
	$todays_evaluation = null;
	$inserted_adjective = null;
	$adjective_error = null;
	
	//kontrollime kas midagi on submittitud
	if (isset($_POST["todays_adjective_input"])){
		//echo "klikiti nuppu!";
		//kas midagi kirjutati ka
		if(!empty($_POST["adjective_input"])){
			$todays_evaluation = "<p>tänane päev on <strong>" .$_POST["adjective_input"] .
			"</strong>.</p>";
			$inserted_adjective = $_POST["adjective_input"];
		} else {
			$adjective_error = "Palun kirjuta sobiv omadussõna";
		}
	}
	//var_dump($_POST);
	
	
	//loeme fotode kataloogi sisu
	$photos_dir = "photos/";
	$allowed_photo_types = ["image/jpeg", "image/png"];
	$all_files = array_slice(scandir($photos_dir), 2);
	//echo $all_files
	//var_dump($all_files)
	
	//sõelun välja ainult lubatud pildid
	$photo_files = [];
	foreach($all_files as $file) {
		$file_info = getimagesize($photos_dir .$file);
		if(isset($file_info["mime"])){
			if(in_array($file_info["mime"], $allowed_photo_types)){
				array_push($photo_files, $file);
			}
		}
	}
	
	//$only_files = array_slice($all_files, 2);
	//var_dump($only_files)
	$limit = count($photo_files);
	$pic_num = mt_rand(0, $limit - 1);
	$pic_file = $photo_files[$pic_num];
	$pic_html = '<img src="' .$photos_dir .$pic_file .'" alt="Tallinna Ülikool">';
	
	$list_html = "<ul>";
	for($i = 0; $i < $limit; $i ++){
		$list_html .= "<li>" .$photo_files[$i] ."</li>";
	}
	$list_html .="</ul>";
	
	$photo_select_html = '<select name="photo_select">' ."\n";
	for($i = 0; $i < $limit; $i ++){
	$photo_select_html .= '<option value ="' .$i .'">' .$photo_files[$i] ."</option > \n";
	
	}
	$photo_select_html .= "</select> \n";
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
	<form method="POST">
		<input type="text" name="adjective_input" placeholder="omadussõna tänase kohta"
		value="<?php echo $inserted_adjective; ?>">
		<input type="submit" name="todays_adjective_input" value="salvesta">
		<span><?php echo $adjective_error; ?> </span>
	</form>
	<hr>
	
	<img src="faeryhuskyemote.png" alt="Koerahaldjas" width="100">
	
	
	<?php 
		echo $todays_evaluation;
		
	?>
	
	<form method = "POST">
	<?php echo $photo_select_html; ?>
	</form>
	
	<?php
		echo $pic_html; 
		echo $list_html;
	?>
	
</body>

</html>