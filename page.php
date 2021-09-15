<?php
  $author_name = "Karen O'Tihhomirov";
	$full_time_now = date("d.m.Y H:i:s");
	$weekday_now = date("N");
	$day_category = date("lihtsalt päev");
	$time_hours = date("H");
	$sleep_time = date("uneaeg");
	$study_time = date("Tundide aeg");
	$chill_time = date("Vaba aeg");
	//echo weekday_now;
	// võrdub == suurem/vähem ...  <  >  <=  >= pole võrnde (excelis <>) ! =
	if($weekday_now <= 5) {
		$day_category = "koolipäev";
	} else {
		$day_category = "puhkepäev";
	}
	$weekday_names_et = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
	//echo $weekday_names_et[2];
	if($time_hours >8 && $time_hours >23) {
		$sleep_time = "uneaeg";
	} elseif ($time_hours >8 && $time_hours <18) {
		$study_time = "tundide aeg";
	} else {
		$study_time = "vaba aeg";
	}
		
		
	//if($hour_now < 7 or $hour_now > 23)
	//if($hour_now < 8 and $hour_now > 18)
	
	//juhuslik foto lisamine;
	$photo_dir = "photos/";
	//loen kataloogi sisu;
	$all_files = scandir($photo_dir);
	$all_real_files = array_slice($all_files, 2);
	
	// sõelume välja päris pildid
	$photo_files = [];
	#allowed_photo_types = ["image/jpeg", "image/png"];
	foreach($all_real_files as $file_name) {
		$file_info = getimagesize($photo_dir .$file_name);
		if(isset($file_name ["mime"])) {
			if(in_array($file_info["mime"], $allowed_photo_types)){
				array_push($photo_files,$file_name);
			}
			
		}//if isset lõppeb
	} //foreach lõppes
	
	//var_dump($all_files);
	//loen massiivielemendit kokku;
	$file_count = count($photo_files);
	//loosin juhusliku arvu(min peab olema 0 ja max count -1)
	$photo_num = mt_rand(0, $file_count -1);
	//<img src="kataloog/fail" alt="kena pilt">
	$photo_html = '<img src="' .$photo_dir . $photo_files[$photo_num] .'" alt ="kena pilt">';
	
?>
<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="utf-8">
	<title><?php echo $author_name; ?></title>
</head>
<body>
	<h1><?php echo $author_name; ?> veebiprogrammeerimine</h1>
	<p>See leht on loodud õppetöö raames ja ei sisalda tõeliseltvõetav sisu!</p>
	<p>Õppetöö toimus <a href="https://www.tlu.ee/dt">Tallinna Ülikooli Digitehnoloogiate Instituudis<a/>.</p>
	<img src="tlukool.jpg" alt="Tallinna Ülikooli maja" width="500x1900">
	<p>Lehe avamise hetk: <?php echo $weekday_names_et[$weekday_now - 1] . ", " .$full_time_now. ", " .$day_category. ", " .$sleep_time, $chill_time, $study_time;?>.<p>
	<?php echo $photo_html; ?>
</body>
</html>