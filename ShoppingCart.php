<html><head><title>Shopping Cart</title></head>
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
	echo "<h2>";
	print("Your Shopping Cart:\n");
	echo "</h2>";
        $result = $pdo->query("SELECT * FROM Cart;");
	$rows = $result->fetchAll(PDO::FETCH_ASSOC);
	echo "<br/>";
	draw_table($rows);
	echo "<br/>";
	cart_form($rows);
	if (isset($_POST['ORDERNUM1']))
        {
            // decalare varaiables
	    $item_id1 = $_POST['ORDERNUM1'];
	    $COUNT = $_POST['COUNT'];
           	     
	    // insert new part
            $prepared2 = $pdo->prepare('UPDATE Cart SET _COUNT = ? WHERE ORDERNUM=?');

	    // execute sql query
	    $prepared2->execute(array($COUNT,$item_id1));
	    echo "<meta http-equiv='refresh' content='0'>";
	    

	}
	if (isset($_POST['ORDERNUM2']))
        {
            // decalare varaiables
	    $item_id2 = $_POST['ORDERNUM2'];
	  	    
            $prepared2 = $pdo->prepare('DELETE FROM Cart WHERE ORDERNUM = ?');

	    // execute sql query
	    $prepared2->execute(array($item_id2));
	    echo "<meta http-equiv='refresh' content='0'>";
	}

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
