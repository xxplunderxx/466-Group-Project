<html><head><title>Employee View</title></head>
    <body>
        <?php
        include("secret.php");
        include("functions.php");
        // username
        // password
        try{
            $dsn = "mysql:host=courses;dbname=".$username;
            $pdo = new PDO($dsn, $username, $password);
        }
         catch(PDOexception $e){
            echo "Connection to database failed: " . $e->getMessage();
	 }
        print("LIST OF TOTAL ITEMS:\n");
        $result1 = $pdo->query("SELECT * FROM Items;");
        $rows = $result1->fetchAll(PDO::FETCH_ASSOC);
        // draw the inventory table
        draw_table($rows);
      
        print("LIST OF ITEMS IN STOCK:\n");
        $result2 = $pdo->query("SELECT * FROM Instock;");
        $Inrows = $result2->fetchAll(PDO::FETCH_ASSOC);
        // draw the inventory table
        draw_table($Inrows);
      
        print("LIST OF ITEMS OUT OF STOCK:\n");
        $result3 = $pdo->query("SELECT * FROM Outstock;");
        $Outrows = $result3->fetchAll(PDO::FETCH_ASSOC);

        // draw the inventory table
        draw_table($Outrows);
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
