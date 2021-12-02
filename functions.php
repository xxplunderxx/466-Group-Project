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

function inventory_form()
{
    // *** inventory selection form *** //
    echo '<form action="" method="POST">';
    
	echo "<h3>"."Select Item (Enter Item IID)"."</h3>";
		echo '<input type="text" name="IID" value="blank"/> Item IID';
		
	echo '<br/><input type="submit" value="Submit"/>';
	echo "</form>";
}

?>
