<?php
    session_start();
    include("../nustatymai.php");
?>
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
                <td>Pilna atlyginimų ataskaita</td>
            </tr>
        </table>
        <br>
        
<?php
    $user_id = $_POST['id'];
    $bendraSuma = 0;
    $apskaiciuotaSuma = 0;
    $valanduKiekis = 0;
    $visoPremiju = 0;
    $db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$query = "SELECT id, data, tarifas, valandu_sk, psd_mokesciai, ismokamas, apskaiciuotas, premija, fk_darbuotojasid "
            . "FROM " . TBL_ATLYGINIMAS . " WHERE fk_darbuotojasID = $user_id ORDER BY data DESC";
	$result = mysqli_query($db, $query);
	if (!$result || (mysqli_num_rows($result) < 1)){  
			{echo "Įrašų nėra!";}
            }else{
                echo "<br><table>";
                echo "<tr><td>ID</td><td>Data</td><td>Valandų sk.</td><td>Tarifas</td><td>Mokesčiai, %</td><td>Premija</td><td>Apskaičiuotas</td><td>Išmokėtas</td></tr>";
                while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["data"]. "</td><td>" . $row["valandu_sk"]. "</td><td>" . $row["tarifas"] . "</td><td>" . $row["psd_mokesciai"] . "</td><td>"
                            . $row["premija"] . "</td><td>" . $row["apskaiciuotas"] . "</td><td>" . $row["ismokamas"] . "</td></tr>";
                        $bendraSuma += $row['ismokamas'];
                        $apskaiciuotaSuma += $row['apskaiciuotas'];
                        $visoPremiju += $row['premija'];
                        $valanduKiekis += $row['valandu_sk'];
                        
                }
                echo "</table>";
                echo "----------------------------------------------------------------------------------------------------------------";
                echo "<table>";
                echo "<tr><td>Viso valandų: <b>" . $valanduKiekis . " h</b></td><td>-</td><td>Viso premijų: <b>" . $visoPremiju . " €</b></td><td>-</td><td>Viso uždirbo: <b>" 
                        . $apskaiciuotaSuma . " €</b></td><td>-</td><td>Viso išmokėta: <b>" . $bendraSuma ." €</b></td><td>-</td><td>Vidutinis atlyginimas: <b>" . $apskaiciuotaSuma / mysqli_num_rows($result) . " €</b></td></tr></table>";
            }
            
        mysqli_close($db);
?>
        <br><br>
        <div class="container" style="background-color:#f1f1f1">
            <a href="darbuotojuSarasas.php">Grįžti</a><br/>
        </div>
    </center>
</body>
</html>