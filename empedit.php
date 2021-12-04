<html><head><title>Items In Stock</title></head>
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
	
	empadditem_form();
	if (isset($_POST['IID1']))
        {
            $item_id1 = $_POST['IID1'];
	    $item1 = $_POST['item_name1'];
	    $cost1 = $_POST['item_cost1'];
            $prepared1 = $pdo->prepare('INSERT INTO Items(IID,_NAME,COST) VALUE(?,?,?)');
	    $prepared1->execute(array($item_id1,$item1,$cost1));
	}
	echo "<br/>";
	empdeleteitem_form();
	if (isset($_POST['IID2']))
        {
            $item_id2 = $_POST['IID2'];
            $prepared2 = $pdo->prepare('DELETE FROM Items WHERE IID = ?');
	    $prepared2->execute(array($item_id2));
	}
	echo "<br/>";
	empaddinstock_form();
	if (isset($_POST['IID3']))
        {
            $item_id3 = $_POST['IID3'];
	    $qty3 = $_POST['QTY3'];
	    $name3 = $_POST['NAME3'];
	    $cost3 = $_POST['COST3'];
	    $type3 = 'IN STOCK';
	    $prepared1 = $pdo->prepare('INSERT INTO Instock(IID,QTY,_NAME,COST,ITEMTYPE) VALUE(?,?,?,?,?)');
	    $prepared1->execute(array($item_id3,$qty3,$name3,$cost3,$type3)); 
	}
	echo "<br/>";
	empdeleteinstock_form();
	if (isset($_POST['IID4']))
        {
            $item_id4 = $_POST['IID4'];
            $prepared2 = $pdo->prepare('DELETE FROM Instock WHERE IID = ?');
	    $prepared2->execute(array($item_id4));
	}
	echo "<br/>";	
	empupdateinstock_form();
	if (isset($_POST['IID5']))
        {
	    $item_id5 = $_POST['IID5'];
	    $qty5 = $_POST['QTY5'];
            $prepared2 = $pdo->prepare('UPDATE Instock SET QTY = ? WHERE IID=?');
	    $prepared2->execute(array($qty5,$item_id5));
	}
	echo "<br/>";
	empaddoutstock_form();
	if (isset($_POST['IID6']))
        {
            $item_id6 = $_POST['IID6'];
	    $qty6 = $_POST['QTY6'];
	    $name6 = $_POST['NAME6'];
	    $cost6 = $_POST['COST6'];
	    $loc6 = $_POST['LOC6'];
	    $type6 = 'OUT OF STOCK';
	    $prepared6 = $pdo->prepare('INSERT INTO Outstock(IID,QTY,_NAME,COST,LOCATION,ITEMTYPE) VALUE(?,?,?,?,?,?)');
	    $prepared6->execute(array($item_id6,$qty6,$name6,$cost6,$loc6,$type6)); 
	}
	echo "<br/>";
	empdeleteoutstock_form();
	if (isset($_POST['IID7']))
        {
            $item_id7 = $_POST['IID7'];
            $prepared7 = $pdo->prepare('DELETE FROM Outstock WHERE IID = ?');
	    $prepared7->execute(array($item_id7));
	}

	echo "<br/>";
	empupdateoutstock_form();
	if (isset($_POST['IID8']))
        {
	    $item_id8 = $_POST['IID8'];
	    $qty8 = $_POST['QTY8'];
            $prepared8 = $pdo->prepare('UPDATE Outstock SET QTY = ? WHERE IID=?');
	    $prepared8->execute(array($qty8,$item_id8));
	}
	echo "<br/>";


	echo "<table cellpadding=30>";
		echo "<tr>";
			echo "<th>";
				echo '<a href="home.html">';
					echo "<h2>";
						echo "RETURN HOME";
					echo "</h2>";
				echo "</a>";
			echo "</th>";
		echo "</tr>";
	echo "</table>";
?>
    </body>
</html>
