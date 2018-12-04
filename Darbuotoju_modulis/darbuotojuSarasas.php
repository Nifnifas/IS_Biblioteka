<html>
<head>
    <title>Bibliotekos informacinė sistema</title>
</head>

<body>
    <a href="/is_biblioteka/atsijungimas.php">Atsijungti</a><br/>
    <a href="/is_biblioteka/paskyrosRedagavimas.php">Redaguoti paskyrą</a><br/>
    <a href="/is_biblioteka/turimiTaskai.php">Turimi taškai</a><br/>
    <center>
        <h1>Bibliotekos informacinė sistema</h1>
        <table border="1" cellpadding="10">
            <tr align="center">
                <td><a href="darbuotojoRegistravimas.php">Naujas darbuotojas</a></td>
            </tr>
        </table>
        <br>
        
        <?php
            include("../nustatymai.php");
            $db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $query = "SELECT id, vardas, pavarde, tel_nr, adresas, isidarbinimo_data, asmens_kodas, el_pastas, sukaupta_atostogu, statusas "
                    . "FROM " . TBL_DARBUOTOJAS . " ORDER BY id ASC";
            $result = mysqli_query($db, $query);
            if (!$result || (mysqli_num_rows($result) < 1)){  
			{echo "Klaida skaitant lentelę `darbuotojas`"; exit;}
            }else{
                echo "<table>";
                echo "<tr><td>ID</td><td>Vardas</td><td>Pavardė</td><td>Asmens kodas</td><td></td></tr>";
                while($row = $result->fetch_assoc()) {
                    /*echo "<tr><td>" . $row["id"]. "</td><td>" . $row["vardas"]. "</td><td>" . $row["pavarde"]. "</td><td>" . $row["Tel_nr"] 
                            . "</td><td>" . "<a href='atlyginimoForma.php?editid='>Atlyginimas</a>" . "</td><td>" . "<a href='premijosForma.php'>Premija</a>" 
                            . "</td><td>" . "<a href='atostoguForma.php'>Atostogos</a>" . "</td></tr>";*/
                    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["vardas"]. "</td><td>" . $row["pavarde"]. "</td><td>" . $row["asmens_kodas"] . "</td><td>" . $row["adresas"] . "</td><td>"
                            . $row["tel_nr"] . "</td><td>" . $row["el_pastas"] . "</td><td>" . $row["isidarbinimo_data"] . "</td><td>"
                            . $row["sukaupta_atostogu"] . "</td><td>" . $row["statusas"] . "</td><td>"
                            . "<form action=\"atlyginimoForma.php\" method=\"post\"><input type=\"submit\" value =\"Atlyginimas\"/><input type=\"hidden\" name=\"user_id\" value=\"$row[id]\">"   
                            . "</form></td><td>" . "<form action=\"atostoguForma.php\" method=\"post\"><input type=\"submit\" value =\"Atostogos\"/><input type=\"hidden\" name=\"user_id\" value=\"$row[id]\">"
                            . "</form></td><td>" . "<form action=\"redagavimoForma.php\" method=\"post\"><input type=\"submit\" value =\"Redaguoti\"/><input type=\"hidden\" name=\"user_id\" value=\"$row[id]\">" 
                            . "</form></td><td>" . "<form action=\"salinimasDarbuotojo.php\" method=\"post\" onsubmit=\"return confirm('Ar tikrai norite ištrinti šį darbuotoją?');\"><input type=\"submit\" value =\"Šalinti\"/><input type=\"hidden\" name=\"user_id\" value=\"$row[id]\">" 
                            . "</form></td></tr>";
                }
                echo "</table>";
            }
        ?>
        
        <br>
        <div class="container" style="background-color:#f1f1f1">
            <a href="/is_biblioteka/index.php">Grįžti</a><br/>
        </div>
    </center>
</body>
</html>