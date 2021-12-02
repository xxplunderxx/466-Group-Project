<html><head><title>Items In Stock</title></head>
    <body>
        <?php
        // username
        // password
        try{
            $dsn = "mysql:host=courses;dbname=z1854210";
            $pdo = new PDO($dsn, $username, $password);
        }
        catch(PDOexception $e){
            echo "Connection to database failed: " . $e->getMessage();
        }
        print("LIST OF ITEMS IN STOCK:\n");
        $result = $pdo->query("SELECT * FROM Instock;");
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        echo "<table border=5 cellspacing=2>";
        echo "<tr>";
        foreach($rows[0] as $key => $item){
	        echo "<th>$key</th>";
        }
        echo "</tr>";
        foreach($rows as $row){
	        echo "<tr>";
	        foreach($row as $key => $item){
		        echo "<td>$item</td>";
	        }
	        echo "</tr>";
        }
        echo "</table>";
            ?>
    </body>
</html>
