<html><head><title>Checkout</title></head>
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
        echo "<h1>";
        echo "CHECKOUT: ";
        echo "</h1>";
        ?>
    </body>
</html>
