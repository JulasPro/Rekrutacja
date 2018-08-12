<?php
	session_start();
	echo "Nazwa utworzonej ligi: ". $_SESSION["name"];
	echo "<br />";
	echo "Ilość drużyn w lidze: ". $_SESSION["amount"];
	
	?>
	<form action="" method="post">
		<?php
		for($i = 1; $i <= $_SESSION["amount"]; $i++){
			echo "Podaj nazwę drużyny nr ".$i.": <br />";
			echo "<input type=\"text\" name=\"team".$i."\"> <br />";
		}
		?>
		<br />
		<input type="submit" value="Submit" name="submit">
	</form>
	<?php
	IF(ISSET($_POST['submit'])){
		for($i = 1; $i <= $_SESSION["amount"]; $i++){

			$_SESSION["team".$i] = $_POST["team".$i];
		}	
			
			$ip = "localhost";
			$user = "root";
			$pass = "";

		$conn = new mysqli($ip, $user, $pass, $_SESSION["name"]);
				if ($conn->connect_error) {
					die("Błąd połączenia: " . $conn->connect_error);
				}

				$sql = "CREATE TABLE IF NOT EXISTS Druzyny (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, Nazwa varchar(30), Wygrane int(2),Przegrane int(2), Punkty int(2))";
				if ($conn->query($sql) === TRUE){
						for($i = 1; $i <= $_SESSION["amount"]; $i++){
							$sql = "insert into druzyny (nazwa, wygrane, przegrane,punkty) values (\"".$_SESSION['team'.$i]."\", 0, 0, 0);"; 
							if ($conn->query($sql) === TRUE){
								header('Location:done.php');
							}
							else {
								echo "Błąd podczas dodawania druzyny: " . $conn->error;
							}
						}
				} else {
					echo "Błąd podczas tworzenia ligi: " . $conn->error;
				}
				$conn->close();
			
	}
?>