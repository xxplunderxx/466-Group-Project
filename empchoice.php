<html><head><title>Employee View</title></head>
    <body>
        <?php
        include("secret.php");
        include("functions.php");
        try{
            $dsn = "mysql:host=courses;dbname=".$username;
            $pdo = new PDO($dsn, $username, $password);
        }
         catch(PDOexception $e){
            echo "Connection to database failed: " . $e->getMessage();
	}
	echo "<table cellpadding=30>";
		echo "<tr>";
			echo "<th>";
				echo '<a href="employeeinventory.php">';
					echo "<h2>";
						echo "VIEW INVENTORY";
					echo "</h2>";
				echo "</a>";
			echo "</th>";
			echo "<th>";
				echo "OR";
			echo "</th>";
			echo "<th>";
				echo '<a href="empedit.php">';
					echo "<h2>";
						echo "EDIT INVENTORY";
					echo "</h2>";
				echo "</a>";
			echo "</th>";
			echo "<th>";
			echo "OR";
			echo "</th>";
			echo "<th>";
				echo '<a href="home.html">';
					echo "<h2>";
						echo "RETURN TO HOMEPAGE";
					echo "</h2>";
				echo "</a>";
			echo "</th>";
			echo "<th>";
			echo "OR";
			echo "</th>";
			echo "<th>";
				echo '<a href="Fullfilment.php">';
					echo "<h2>";
						echo "VIEW ORDERS";
					echo "</h2>";
				echo "</a>";
			echo "</th>";

		echo "</tr>";
	echo "</table>";
	?>
    </body>
</html>
