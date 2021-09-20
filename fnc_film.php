<?php	
	
	$database = "if21_inga_pe_T2";
	
	function read_all_films(){
		//avan andmebaasi ühenduse			server, kasutaja, parool, andmebaas
		$conn = new mysqli ($GLOBALS["server_host"], $GLOBALS["server_user_name"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$conn->set_charset("utf8");
		$stmt = $conn->prepare("SELECT * FROM film");
		//kui on vigu, väljastame
		echo $conn->error;
		//saadud info peame siduma muutujatega
		$stmt->bind_result($title_from_db, $year_from_db, $duration_from_db, $genre_from_db, $studio_from_db, $director_from_db);
		//käsk täita
		$stmt->execute();
		//fetch()
		//<h3>pealkiri</h3>
		//täpploend
		$films_html = null;
		//while(tingimus)
			
		
		
		while($stmt->fetch()){
			$films_html .= "<h3>" .$title_from_db ."</h3> \n";
			$films_html .= "<ul> \n";
			$films_html .= "<li>Valmimisaasta: " .$year_from_db ."</li> \n";
			$films_html .= "<li>Kestvus: " .$duration_from_db ."</li> \n";
			$films_html .= "<li>Žanr: " .$genre_from_db ."</li> \n";
			$films_html .= "<li>Tootja: " .$studio_from_db ."</li> \n";
			$films_html .= "<li>Lavastaja: " .$director_from_db ."</li> \n";
			$films_html .= "</ul> \n";
		}
		//sulgeme sql käsu
		$stmt->close();
		//sulgeme andmebaasi ühenduse
		$conn->close();
		return $films_html;
	}
	
	
	function store_film($title_input, $year_input, $duration_input, $genre_input, $studio_input, $director_input){
		$conn = new mysqli ($GLOBALS["server_host"], $GLOBALS["server_user_name"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$conn->set_charset("utf8");
		$smt = $comm->prepare("INSERT INTO film (pealkiri, aasta, kestus, zanr, tootja, lavastaja) values(?,?,?,?,?,?)");
		echo $conn->error;
		$smt->bind_param(siisss, $title_input, $year_input, $duration_input, $genre_input, $studio_input, $director_input);
		$success=null;
		if($stmt->execute()){
			$success = "Salvestamine õnnestus";
		}
		
		$stmt->close();
		$conn->close();
	}