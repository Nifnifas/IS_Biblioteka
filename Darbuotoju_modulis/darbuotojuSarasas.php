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
            session_start();
            include("../nustatymai.php");
            $AtostogaujanciuSk = 0;
            $db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $query = "SELECT id, vardas, pavarde, tel_nr, adresas, isidarbinimo_data, asmens_kodas, el_pastas, sukaupta_atostogu, statusas, statusas_iki "
                    . "FROM " . TBL_DARBUOTOJAS . " ORDER BY id ASC";
            $result = mysqli_query($db, $query);
            if (!$result || (mysqli_num_rows($result) < 1)){  
			{echo "Klaida skaitant lentelę `darbuotojas`"; exit;}
            }else{
                $visoDarb = mysqli_num_rows($result);
                echo "<table>";
                echo "<tr><td>ID</td><td>Vardas</td><td>Pavardė</td><td>Asmens kodas</td><td>Adresas</td><td>Telefono nr.</td><td>El. Paštas</td><td>Įsidarbinimo data</td><td>"
                . "Atostogų likutis (d.d.)</td><td>Statusas</td><td>Iki (data)</td></tr>";
                while($row = $result->fetch_assoc()) {
                    if(($row["statusas_iki"] < date("Y-m-d")) && ($row["statusas_iki"] != '0000-00-00')){
                        $_SESSION['iden'] = $row["id"];
                        include ("keistiStatusa.php");
                    }
                    if($row["statusas_iki"] == '0000-00-00'){
                        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["vardas"]. "</td><td>" . $row["pavarde"]. "</td><td>" . $row["asmens_kodas"] . "</td><td>" . $row["adresas"] . "</td><td>+370 "
                            . $row["tel_nr"] . "</td><td>" . $row["el_pastas"] . "</td><td>" . $row["isidarbinimo_data"] . "</td><td>"
                            . $row["sukaupta_atostogu"] . "</td><td>" . $row["statusas"] . "</td><td>" . "-" . "</td><td>"
                            . "<form action=\"atlyginimoForma.php\" method=\"post\"><input type=\"submit\" value =\"Atlyginimas\"/><input type=\"hidden\" name=\"user_id\" value=\"$row[id]\">"   
                            . "</form></td><td>" . "<form action=\"atostoguForma.php\" method=\"post\"><input type=\"submit\" value =\"Atostogos\"/><input type=\"hidden\" name=\"user_id\" value=\"$row[id]\">"
                            . "</form></td><td>" . "<form action=\"redagavimoForma.php\" method=\"post\"><input type=\"submit\" value =\"Redaguoti\"/><input type=\"hidden\" name=\"user_id\" value=\"$row[id]\">" 
                            . "</form></td><td>" . "<form action=\"salinimasDarbuotojo.php\" method=\"post\" onsubmit=\"return confirm('Ar tikrai norite ištrinti šį darbuotoją?');\"><input type=\"submit\" value =\"Šalinti\"/><input type=\"hidden\" name=\"user_id\" value=\"$row[id]\">" 
                            . "</form></td></tr>";
                    }
                    else{
                        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["vardas"]. "</td><td>" . $row["pavarde"]. "</td><td>" . $row["asmens_kodas"] . "</td><td>" . $row["adresas"] . "</td><td>+370 "
                            . $row["tel_nr"] . "</td><td>" . $row["el_pastas"] . "</td><td>" . $row["isidarbinimo_data"] . "</td><td>"
                            . $row["sukaupta_atostogu"] . "</td><td>" . $row["statusas"] . "</td><td>" . $row["statusas_iki"] . "</td><td>"
                            . "<form action=\"atlyginimoForma.php\" method=\"post\"><input type=\"submit\" value =\"Atlyginimas\"/><input type=\"hidden\" name=\"user_id\" value=\"$row[id]\">"   
                            . "</form></td><td>" . "<form action=\"atostoguForma.php\" method=\"post\"><input type=\"submit\" value =\"Atostogos\"/><input type=\"hidden\" name=\"user_id\" value=\"$row[id]\">"
                            . "</form></td><td>" . "<form action=\"redagavimoForma.php\" method=\"post\"><input type=\"submit\" value =\"Redaguoti\"/><input type=\"hidden\" name=\"user_id\" value=\"$row[id]\">" 
                            . "</form></td><td>" . "<form action=\"salinimasDarbuotojo.php\" method=\"post\" onsubmit=\"return confirm('Ar tikrai norite ištrinti šį darbuotoją?');\"><input type=\"submit\" value =\"Šalinti\"/><input type=\"hidden\" name=\"user_id\" value=\"$row[id]\">" 
                            . "</form></td></tr>";
                        $AtostogaujanciuSk++;
                    } 
                }
                echo "</table>";
                $_SESSION['atos'] = $AtostogaujanciuSk;
            }
        ?>
        <div id="time">
    <?php
        echo "Viso darbuotojų: <b>$visoDarb</b> - ";
        echo "Iš jų atostogauja: <b>$AtostogaujanciuSk</b> - ";
        echo "Atnaujinta: ";
        date_default_timezone_set('Europe/Vilnius');
        echo date('H:i:s');
    ?>
        </div> 
        
        <script type="text/javascript">
            setInterval("my_function();",600000); 
 
            function my_function(){
                window.location = location.href;
            }
        </script>
        
        <br>
        <div class="container" style="background-color:#f1f1f1">
            <a href="/is_biblioteka/index.php">Grįžti</a><br/>
        </div>
    </center>
</body>
</html>