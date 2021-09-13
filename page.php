<?php
	$author_name = "Karl Voldemar Palm";
	$weekday_names_et = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
	$full_time_now =date("d.m.Y H;i;s");
	$hour_now = date("G");
	echo $hour_now;
	$weekday_now = date("N");
	//echo $weekday_now;
	$day_category = "Ebamäärane";
	if($weekday_now <= 5){
		$day_category = "Koolipäev :(";
	} else {
		$day_category = "Puhkepäev :)";
	}
	//echo $day_category;
	
	//kodune ülessanne
	
	
	$day_type = "Teadmata";
	$time_category = "Teadmata";
	
	if($weekday_now >= 1 and $weekday_now <= 5){
		if($hour_now >= 8 and $hour_now <= 18){
			$time_category = "aeg õppida!!";
		} elseif ($hour_now > 18 and $hour_now <= 22){
			$time_category = "vaba aeg!!";
		} elseif ($hour_now >22 and $hour_now <8){
			$time_category = "tuduaeg!!";
		}
	} else {
		if($hour_now >= 10 and $hour_now <= 18){
			$time_category = "Aeg hängida!!";
		} elseif ($hour_now > 18 and $hour_now <= 23){
			$time_category = "aeg pelada!!";
		} elseif ($hour_now >23 and $hour_now <10){
			$time_category = "aeg põõnata!!";
		}
	}
	
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
	$pic_html = '<img src="' .$photos_dir .$pic_file .'" alt="Tallinna Ülikool"'
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
	<img src="3700x1100pildivalik181.jpg" alt="Tallinna Ülikooli sissepääs" width="600">
	<p>Lehe avamise hetkel oli kell ja kuupäev: <span><?php echo $weekday_names_et [$weekday_now - 1] .", " .$full_time_now .", on " . $day_category; ?></span>.</p>
	<p>Praegu on <span><?php echo $time_category; ?></span>.</p>
	<h2>Kursusel õpime</h2>
	<ul>
		<li>HTML keelt</li>
		<li>PHP programmeerimiskeelt</li>
		<li>SQL päringukeelt</li>
	</ul>
	<p>Koduse ulessandega oli ilge jama!</p>
	<p>Seetottu siia tuleviku jaoks koerahaldjas kes koikide koduste toodega aitab ja head onne toob!</p>
	<img src="faeryhuskyemote.png" alt="Koerahaldjas" width="100">
	
	<?php echo $pic_html; ?>
	
</body>

</html>