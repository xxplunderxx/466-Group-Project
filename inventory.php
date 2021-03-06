<html><head><title>Items In Stock</title></head>
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

        print("LIST OF ITEMS ON SHELVES:\n");
        $result = $pdo->query("SELECT * FROM Instock;");
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        // draw the inventory table
	draw_table($rows);

        // create a form, so the user can select an item to buy
        inventory_form();

        if (isset($_POST['IID']))
        {
            // decalare varaiables
	    $item_id = $_POST['IID'];
	    $QTY = $_POST['QTY'];
	    
            // prepare sql query to buy the item that the user selected
            $prepared = $pdo->prepare('SELECT Cost,_Name FROM Instock WHERE IID = ?');

            // execute sql query
	    $prepared->execute(array($item_id));
            $rows = $prepared->fetch();
	    // get name and cost
	    $item_cost = $rows[0];
	    $item_name = $rows[1];    
	    echo "You ordered ".$QTY." Items";
	    echo "<br/>";
	    echo "Item Name: ". $item_name . " ,  Item Cost: ". $item_cost;
	    // insert new part
            $prepared2 = $pdo->prepare('INSERT INTO Cart(TOTAL,_NAME,_COUNT) VALUE(?,?,?)');

	    // execute sql query
            $prepared2->execute(array($item_cost,$item_name,$QTY));
	    

	}
	// link to shoppping cart
	echo "<table cellpadding=30>";
		echo "<tr>";
			echo "<th>";
				echo '<a href="ShoppingCart.php">';
					echo "<h2>";
						echo "Shopping Cart";
					echo "</h2>";
				echo "</a>";
			echo "</th>";
		echo "</tr>";
	echo "</table>";
?>
    </body>
</html>
