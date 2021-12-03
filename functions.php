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
function empadditem_form()
{
    //  inventory selection form  //
    echo '<form action="" method="POST">';

    echo "<h3>"."Add to item list"."</h3>";
        echo '<input type="text" name="IID1"/> IID ';    // item select
        echo '<input tupe="text" name="item_name1"/> ITEM NAME ';         // quantity input
	echo '<input tupe="text" name="item_cost1"/> COST ';         // quantity input

    echo '<br/><input type="submit" value="Submit"/>';
    echo "</form>";
}
function empdeleteitem_form()
{
    //  inventory selection form  //
    echo '<form action="" method="POST">';

    echo "<h3>"."DELETE ITEM FROM Items"."</h3>";
        echo '<input type="text" name="IID2"/> IID ';    // item select
   

    echo '<br/><input type="submit" value="Submit"/>';
    echo "</form>";
}
function empaddinstock_form()
{
    //  inventory selection form  //
    echo '<form action="" method="POST">';

    echo "<h3>"."ADD TO Instock"."</h3>";
        echo '<input type="text" name="IID3"/> IID ';    // item select
	echo '<input type="text" name="QTY3"/> QTY ';    // item select
	echo '<input type="text" name="NAME3"/> Item Name ';    // item select
	echo '<input type="text" name="COST3"/> Cost ';    // item select
	
    echo '<br/><input type="submit" value="Submit"/>';
    echo "</form>";
}
function empdeleteinstock_form()
{
    //  inventory selection form  //
    echo '<form action="" method="POST">';

    echo "<h3>"."DELETE ITEM FROM Instock"."</h3>";
        echo '<input type="text" name="IID4"/> IID ';    // item select
    echo '<br/><input type="submit" value="Submit"/>';
    echo "</form>";
}
function empupdateinstock_form()
{
    //  inventory selection form  //
    echo '<form action="" method="POST">';

    echo "<h3>"."UPDATE Instock QTY"."</h3>";
        echo '<input type="text" name="IID5"/> IID ';    // item select
	echo '<input type="text" name="QTY5"/> QTY ';    // item select
    echo '<br/><input type="submit" value="Submit"/>';
    echo "</form>";
}
function empaddoutstock_form()
{
    //  inventory selection form  //
    echo '<form action="" method="POST">';

    echo "<h3>"."ADD TO Outstock"."</h3>";
        echo '<input type="text" name="IID6"/> IID ';    // item select
	echo '<input type="text" name="QTY6"/> QTY ';    // item select
	echo '<input type="text" name="NAME6"/> Item Name ';    // item select
	echo '<input type="text" name="COST6"/> Cost ';    // item select
	echo '<input type="text" name="LOC6"/> Location ';    // item select
	
    echo '<br/><input type="submit" value="Submit"/>';
    echo "</form>";
}
function empdeleteoutstock_form()
{
    //  inventory selection form  //
    echo '<form action="" method="POST">';
    echo "<h3>"."DELETE ITEM FROM Outstock"."</h3>";
        echo '<input type="text" name="IID7"/> IID ';    // item select
    echo '<br/><input type="submit" value="Submit"/>';
    echo "</form>";
}
function empupdateoutstock_form()
{
    //  inventory selection form  //
    echo '<form action="" method="POST">';

    echo "<h3>"."UPDATE Outstock QTY"."</h3>";
        echo '<input type="text" name="IID8"/> IID ';    // item select
	echo '<input type="text" name="QTY8"/> QTY ';    // item select
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

function F_form()
{
    //  inventory selection form  //
    echo '<form action="" method="POST">';

    echo "<h3>"."Change Order Staus"."</h3>";
        echo '<input type="text" name="Num"/> NUMBER ';    // item select
        echo '<input tupe="text" name="Stat"/> STATUS (P or S) ';         // status input

    echo '<br/><input type="submit" value="Submit"/>';
    echo "</form>";
}

?>
