<?php 
	require("functions.php");
	
	// kas on sisseloginud, kui ei ole siis
	// suunata login lehele
	if (!isset ($_SESSION["userId"])) {
		
		header("Location: login.php");
		exit();
		
	}
	
	
	//kas ?logout on aadressireal
	if (isset($_GET["logout"])) {
		
		session_destroy();
		
		header("Location: login.php");
		exit();
		
	}
	
	// ei ole tühjad väljad mida salvestada
	if ( isset($_POST["gender"]) &&
		 isset($_POST["color"]) &&
		 !empty($_POST["gender"]) &&
		 !empty($_POST["color"])
	  ) {
		
		$gender = cleanInput($_POST["gender"]);
		
		savePeople($gender, cleanInput($_POST["color"]));
	}
	
	$people = getAllPeople();
	
	$subject = "123 123 123";
	echo $subject;
	echo "<br>";
	$output = str_replace(" ", "", $subject);
	echo $output;
	echo "<br>";
	// trim($str)-  only whitespace from the beginning and end. 
	$meil= "    marIaNn@tlu.ee    ";
	echo $meil;
	echo "<br>";
	echo (trim($meil));
	echo  "<br>";
	$str = "Is your name O\'reilly?";
	echo $str;
	echo  "<br>";
	echo stripslashes($str); // function removes /
	echo  "<br>";
	$str = "This is some <b>bold</b> text.";
	echo $str;
	echo  "<br>";
	echo htmlspecialchars($str); //The htmlspecialchars() function converts some predefined characters to HTML entities
	
	
?>
<h1>Data</h1>
<p>
	Tere tulemast <?=$_SESSION["email"];?>!
	<a href="?logout=1">Logi välja</a>
</p> 

<h1>Salvesta inimene</h1>
<form method="POST">
			
	<label>Sugu</label><br>
	<input type="radio" name="gender" value="male" > Mees<br>
	<input type="radio" name="gender" value="female" > Naine<br>
	<input type="radio" name="gender" value="Unknown" > Ei oska öelda<br>
	
	<!--<input type="text" name="gender" ><br>-->
	
	<br><br>
	<label>Värv</label><br>
	<input name="color" type="color"> 
	
	<br><br>
	<input type="submit" value="Salvesta">
	
</form>

<h2>Arhiiv</h2>
<?php 

	foreach($people as $p){
		
		echo 	"<h3 style=' color:".$p->clothingColor."; '>"
				.$p->gender
				."</h3>";
	}
?>

<h2>Arhiivtabel</h2>
<?php 
	
	$html = "<table>";
		$html .= "<tr>";
			$html .= "<th>id</th>";
			$html .= "<th>Sugu</th>";
			$html .= "<th>Värv</th>";
			$html .= "<th>Loodud</th>";
		$html .= "</tr>";

		foreach($people as $p){
			$html .= "<tr>";
				$html .= "<td>".$p->id."</td>";
				$html .= "<td>".$p->gender."</td>";
				$html .= "<td style=' background-color:".$p->clothingColor."; '>"
						.$p->clothingColor
						."</td>";
				//<img width="200" src=' ".$url." '>
						
				$html .= "<td>".$p->created."</td>";
			$html .= "</tr>";	
		}
		
	$html .= "</table>";
	echo $html;

?>




