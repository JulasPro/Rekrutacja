<?php
	
	session_start();
	require("main.php");
	
	class new_league extends main
	{	
		public $name;
		
		public function Display()
		{
			echo "<html>\n<head>\n";
				$this -> DisplayTitle();
				$this -> DisplayMetadata();
				$this -> DisplayStyle();
			echo "</head>\n<body>\n";
				echo "<div id=\"container\">";
				$this -> DisplayContainer();
				echo "</body>\n</html>\n"; 
		}
		
		public function DisplayContainer()
		{
			
			?>
			<form action="" method="post">
				Podaj nazwę nowej ligi: <br />
				<input type="text" name="name"> <br />
				Podaj ilość drużyn w lidze: <br />
				<select name="amount">
					<option value="4">4</option>
					<option value="8">8</option>
					<option value="16">16</option>
				 </select> <br />
				<br />
				<input type="submit" value="Submit" name="submit">
			</form>
			<?php
			IF(ISSET($_POST["submit"])){
				$_SESSION["name"] = $_POST["name"]; 
				$_SESSION["amount"] = $_POST["amount"];

			
			$ip = "localhost";
			$user = "root";
			$pass = "";

				$conn = new mysqli($ip, $user, $pass);
				if ($conn->connect_error) {
					die("Błąd połączenia: " . $conn->connect_error);
				}

				$sql = "CREATE DATABASE ".$_SESSION["name"]."";
				if ($conn->query($sql) === TRUE) {
					header('Location:insert_teams.php');
				} else {
					echo "Błąd podczas tworzenia ligi: " . $conn->error;
				}

				$conn->close();
			}
		}
	}
	
	$newleague = new new_league();
	$newleague -> Display();
?>