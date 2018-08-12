<?php
	require("main.php");
	
	class home extends main
	{		
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
			<ul>
				<li><a href="new_league.php">Utwórz nową ligę!</a>
			<?php
			
			$ip = "localhost";
			$user = "root";
			$pass = "";

			$conn = new mysqli($ip, $user, $pass);
			$sql = "SHOW DATABASES";
				$result = $conn->query($sql);
				if ($result === false) {
					throw new Exception("Could not execute query: " . $conn->error);
				}

				$db_names = array();
				while($row = $result->fetch_array(MYSQLI_NUM)) { 
					$db_names[] = $row[0];
				}
				$count = count($db_names);
				for($i = 0; $i < $count; $i++){	
					echo "<li><a href=\"league.php/?league=".$db_names[$i]."\"> Liga ".$db_names[$i]."</a>";
				}
			?>
			</ul>
			<?php		
		}
	}
	
	$home = new home();
	$home -> Display();
?>