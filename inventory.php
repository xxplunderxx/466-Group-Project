<html><head><title>Items In Stock</title></head>
    <body>
        <?php
        include("secret.php");
        include("functions.php");
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

        // draw the inventory table
        draw_table($rows);

        // create a form, so the user can select an item to buy
        inventory_form();
            ?>
    </body>
</html>
