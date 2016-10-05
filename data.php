<?php 
	require("functions.php");
	
	// kas on sisseloginud, kui ei ole siis
	// suunata login lehele
	if (!isset ($_SESSION["userId"])) {
		
		header("Location: login.php");
		
	}
	
	//kas ?logout on aadressireal
	if (isset($_GET["logout"])) {
		
		session_destroy();
		
		header("Location: login.php");
		
	}
	

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




