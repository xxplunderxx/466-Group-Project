<html><head><title>Checkout</title></head>
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
        echo "<h1>";
        echo "CHECKOUT: ";
        echo "</h1>";
                checkout_form();

        if(isset($_POST['_NAME']))
        {
        // decalare varaiables
        $name = $_POST['_NAME'];
	    $addy = $_POST['ADDRESS'];
	    $card = $_POST['CC'];
           	     
	    // insert new part
            $prepared2 = $pdo->prepare('INSERT INTO User(_NAME,CC,ADDRESS) VALUE(?,?,?);');

	    // execute sql query
	    $prepared2->execute(array($name,$card,$addy));
	    echo "<meta http-equiv='refresh' content='0'>";
        }
        ?>
    </body>
</html>
