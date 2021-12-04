<html><head><title>User Order View</title></head>
<body>

<?php
    include("secret.php");
    include("functions.php");
    try{
        $dsn = "mysql:host=courses;dbname=".$username;
        $pdo = new PDO($dsn, $username, $password);
    }
    catch(PDOexception $e)
    {
        echo "Connection to database failed: " . $e->getMessage();
    }   

  // print out the fullfilment page
  $sql = "SELECT * FROM Fullfilment;";
	$result = $pdo->query($sql);
	//FETCH BOTH NEEDED TO GET USABLE INDEX	
	$rows = $result->fetchAll(PDO::FETCH_ASSOC);
	draw_table($rows);
	echo "<table cellpadding=30>";
		echo "<tr>";
			echo "<th>";
				echo '<a href="home.html">';
					echo "<h2>";
						echo "Return to homepage";
					echo "</h2>";
				echo "</a>";
			echo "</th>";
		echo "</tr>";
	echo "</table>";
?>
</body>
</html>
