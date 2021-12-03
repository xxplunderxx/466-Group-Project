<?php

function draw_table($rows)
{
    if(empty($rows))
    {
        echo "<p>No Results found</p>";
    }

    else
    {
        echo "<table border=2 cellspacing=2>";
        echo "<tr>";

        foreach($rows[0] as $key => $item)
        {
            echo "<th>$key</th>";
        }
        echo "</tr>";

        foreach($rows as $row )
        {
            echo "<tr>";
            foreach($row as $key => $item)
                {
                    echo "<td>$item</td>";
                }
            echo "</tr>";
        }
        echo "</table>";
    }
}
function draw_table_no_header($rows)
{
    if(empty($rows))
    {
        echo "<p>No Results found</p>";
    }

    else
    {
        echo "<table border=2 cellspacing=2>";
        echo "<tr>";
        foreach($rows as $row )
        {
            echo "<tr>";
            foreach($row as $key => $item)
                {
                    echo "<td>$item</td>";
                }
            echo "</tr>";
        }
        echo "</table>";
    }
}

function inventory_form()
{
    // *** inventory selection form *** //
    echo '<form action="" method="POST">';
    
	echo "<h3>"."Select Item and purchase quantity"."</h3>";
		echo '<input type="text" name="IID"/> Item IID ';    // item select
        echo '<input tupe="text" name="QTY"/> QTY';         // quantity input
		
	echo '<br/><input type="submit" value="Submit"/>';
	echo "</form>";
}
function cart_form()
{
    //  inventory selection form  //
    echo '<form action="" method="POST">';

    echo "<h3>"."Update item amount"."</h3>";
        echo '<input type="text" name="ORDERNUM1"/> ORDERNUM ';    // item select
        echo '<input tupe="text" name="COUNT"/> QTY ';         // quantity input

    echo '<br/><input type="submit" value="Submit"/>';
    echo "</form>";
	////////
    echo '<form action="" method="POST">';

    echo "<h3>"."Delete Item in Cart"."</h3>";
        echo '<input type="text" name="ORDERNUM2"/> ORDERNUM ';    // item select

    echo '<br/><input type="submit" value="Submit"/>';
    echo "</form>";
}
function checkout_form()
{
    echo '<form method="POST">';
        
    echo "<h3>"."Insert Billing Information"."</h3>";
        echo '<input type="text" name="_NAME"/> NAME ';    // Name
        echo '<input type="text" name="ADDRESS"/> ADDRESS ';    // Shipping addess
        echo '<input tupe="text" name="CC"/> CC ';         // Billing information credit card

        echo '<br/><input type="submit" value="Submit"/>';
    echo "</form>";


    // completly submit
    echo '<form method="POST">';
        
    echo "<h3>"."Complete Checkout"."</h3>";
        echo '<input type="radio" name="Done"/> Yes ';    // Name

        echo '<br/><input type="submit" value="Submit"/>';
    echo "</form>";
}

?>
