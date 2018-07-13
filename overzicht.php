<table class="overzicht" style="width: 100%;">
    <?php
//als user in gelogt is ga door anders stuur naar login pagina 
    if ($_SESSION["login"] = 1) {
	//alles wat je nodig hebt uit database halen.
        $sql = "SELECT * FROM `gegevens` ORDER BY `gegevens`.`bsn` ASC";
    // Voer de query uit en en sla op in recordset (@ betekent: onderdruk errormessages)

        //$result2 = @mysqli_query($conn, $sql) or die(mysqli_error());

        if ($result = $conn->query($sql) === true) {
	    //boven kant table
            echo "		<tr>";
            echo "			<th>bsn</th>";
            echo "			<th>jaar</th>";
            echo "			<th>bruto</th>";
            echo "			<th>werkgever</th>";
            echo "		</tr>";

            while ($row = mysqli_fetch_assoc($result)) { 

		    // Sla veldwaarden voor leesbaarheid op in variabelen	
                $BSN = $row["bsn"];
                $jaar = $row["jaar"];
                $huurtoeslag = $row["huurtoeslag"];
													
		    // Maak tabe
                echo "<tr>";
                echo "  <td><input type='hidden' value='$BSN' name='bsn'>$BSN</td>";
                echo "  <td><input type='hidden' value='$jaar' name='jaar'>$jaar</td>";
                echo "  <td><input type='hidden' value='$zorg' name='zorg'>$zorg</td>";
                echo "  <td><input type='hidden' value='$huurtoeslag' name='huurtoeslag'>$huurtoeslag</td>";
            // delete buttom met alles gegevens door sturen
                echo "<td>
                    <form action='delete.php?currenpage=uwoverzicht' method='post'>
					    <input type='hidden' name='BSN' value='" . $BSN . "'>
					    <input type='hidden' name='jaar' value='" . $jaar . "'>
					    <input type='hidden' name='hidden' value='" . $hidden . "'>
                        <input type='submit' class='button smal' name'action' value='delete '>
                    </form>
                </td>";
                echo "</tr>";
            }
        } else {
            // er is iets mis gegaan met ophalen van data
        }
    } else {
    // terug naar login pagina en melding geven dat de user moet inloggen om deze pagina te kunnen zien.
        header('Location:signInSignUp.php?status=login');
    }
    ?>
</table>	