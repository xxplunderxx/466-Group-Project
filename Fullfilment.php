<html><head><title>Fullfilment</title></head>
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

    // print out the fullfilment page
    $sql = "SELECT * FROM Fullfilment;";
	$result = $pdo->query($sql);
	//FETCH BOTH NEEDED TO GET USABLE INDEX	
	$rows = $result->fetchAll(PDO::FETCH_ASSOC);

    draw_table($rows);

    // initiate form
    F_form();

    if(isset($_POST['Num']) AND isset($_POST['Stat']))
    {
        $Stat = $_POST['Stat'];
        $Num = $_POST['Num'];

        // make sure user put in a valid status
        if ($Stat == 'P' OR $Stat == 'S')
        {
            $prepared = $pdo->prepare('UPDATE Fullfilment SET _STATUS = ? WHERE NUMBER = ?');

            // execute sql query
	    $prepared->execute(array($Stat,$Num));
	    echo "<meta http-equiv='refresh' content='0'>";
        }
        else
        {
            echo 'Erorr input P or S as status';
        }
    }
    	$sql = "SELECT QTY FROM Fullfilment;";
	$result = $pdo->query($sql);
	//FETCH BOTH NEEDED TO GET USABLE INDEX
	$rows = $result->fetchAll(PDO::FETCH_BOTH);
	$TOTAL = 0.00;
	for($i = 0;$i < sizeof($rows);$i++){
		for($j = 0; $j <1; $j++){
			$TOTAL+=$rows[$i][$j];
		}
	}
	echo "Total of orders: $".$TOTAL;
	?>

</body>
</html>
