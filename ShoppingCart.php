<html><head><title>Shopping Cart</title></head>
    <body>
<?php
	include("secret.php");
	include("functions.php");
        try{
            $dsn = "mysql:host=courses;dbname=z1854210";
            $pdo = new PDO($dsn, $username, $password);
        }
        catch(PDOexception $e){
            echo "Connection to database failed: " . $e->getMessage();
        }
        print("Your Shopping Cart:\n");
        $result = $pdo->query("SELECT * FROM Cart;");
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
	draw_table($rows);
	echo "<br/>";
	print("Would you like to continue shopping or checkout? ");
	echo "<br/>";
	echo "<table cellpadding=30>";
		echo "<tr>";
			echo "<th>";
				echo '<a href="inventory.php">';
					echo "<h2>";
						echo "Continue Shopping";
					echo "</h2>";
				echo "</a>";
			echo "</th>";
			echo "<th>";
				echo "OR";
			echo "</th>";
			echo "<th>";
				echo '<a href="Checkout.php">';
					echo "<h2>";
						echo "Checkout";
					echo "</h2>";
				echo "</a>";
			echo "</th>";
		echo "</tr>";
	echo "</table>";
?>
    </body>
</html>
