<html><head><title>Checkout</title></head>
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
	
	$sql = "SELECT TOTAL,_COUNT FROM Cart;";
	$result = $pdo->query($sql);
	//FETCH BOTH NEEDED TO GET USABLE INDEX	
	$rows = $result->fetchAll(PDO::FETCH_BOTH);
	$TOTAL = 0.00;
	foreach($rows as [$total,$count]){
		$TOTAL+= $total * $count;
	}

    	echo "<h1>";
	echo "CHECKOUT:";
	echo "</h1>";
	$result = $pdo->query("SELECT _NAME,_COUNT,TOTAL FROM Cart;");
	$rows = $result->fetchAll(PDO::FETCH_ASSOC);
	echo "<h3>";
	echo "Your Cart:";
	echo "</h3>";
	draw_table_no_header($rows);
	echo "<h3>";
	echo "Cart Total: $" . $TOTAL;

	checkout_form();

   	if(isset($_POST['_NAME']))
    	{
            $name = $_POST['_NAME'];
       	    $addy = $_POST['ADDRESS'];
       	    $card = $_POST['CC'];
            //working insert into User table	     
            $prepared2 = $pdo->prepare('INSERT INTO User(_NAME,CC,ADDRESS) VALUE(?,?,?);');
            $prepared2->execute(array($name,$card,$addy));
            // echo "<meta http-equiv='refresh' content='0'>";
    	}

	if(isset($_POST['Done']))
        {
            // insert into order
	    $prepared2 = $pdo->prepare('INSERT INTO Ord(TOTAL) VALUE(?);');
	    $prepared2->execute(array($TOTAL));
            // insert into fullfilment
	    $prepared2 = $pdo->prepare('INSERT INTO Fullfilment(_Status,QTY) VALUE(?,?);');
	    $prepared2->execute(array('P',$TOTAL));
	     echo "<meta http-equiv='refresh' content='0'>";
	    //subtract how much the user bought from the Instock items
	    $sql = "SELECT _NAME,_COUNT FROM Cart;";
	    $result = $pdo->query($sql);	
	    $rows = $result->fetchAll(PDO::FETCH_BOTH);
	    //loop thru array to set the new quantities
	    for($i = 0; $i < sizeof($rows); $i++){
		    for($j = 1; $j<2;$j++){
			    $prepared = $pdo->prepare('UPDATE Instock SET QTY = QTY - ? WHERE _NAME = ?;');
			    $prepared->execute(array($rows[$i][$j],$rows[$i][0]));
		    }
	    }	   
	    //reset shopping cart for next customer
            $result = $pdo->query("DELETE FROM Cart WHERE TOTAL >= 0.00");
	}
	echo "<table cellpadding=30>";
		echo "<tr>";
			echo "<th>";
				echo '<a href="home.html">';
					echo "<h2>";
						echo "Return to homepage";
					echo "</h2>";
				echo "</a>";
			echo "</th>";
			echo "<th>";
				echo '<a href="UserOrderView.php">';
					echo "<h2>";
						echo "View order list and status";
					echo "</h2>";
				echo "</a>";
			echo "</th>";
		echo "</tr>";
	echo "</table>";
	?>
    </body>
</html>
