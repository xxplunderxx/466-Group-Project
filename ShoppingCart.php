<html><head><title>Items In Stock</title></head>
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
        draw_table($rows)
            ?>
    </body>
</html>
