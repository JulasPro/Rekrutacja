<?php
	
	$ip = "localhost";
	$user = "root";
	$pass = "";
	$db = strval($_GET['league']);
	$connect = mysqli_connect($ip, $user, $pass, $db);
	?>
	<h1>TABELA LIGII <?php echo $db; ?> </h1>
	<?php
		
		
		$query = mysqli_query($connect, "select * from druzyny");
		$rekord = mysqli_fetch_array($query);
		$num_rows = mysqli_num_rows($query);
		?>
		<table>
			<th>Nazwa</th>
			<th>Wygrane</th>
			<th>Przegrane</th>
			<th>Punkty</th>
		<?php
		for($i = 0; $i <= $num_rows; $i++){	
			$query1 = mysqli_query($connect, "select * from druzyny where id = ".$i."");
			$rekord = mysqli_fetch_array($query1);
			echo "<tr><td>".$rekord[1]."</td><td>".$rekord[3]."</td><td>".$rekord[2]."</td><td>".$rekord[4]."</td></tr>";
		}
		?>
		</table>
		<?php
?>

