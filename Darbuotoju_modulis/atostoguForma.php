<?php
session_start();
include("../nustatymai.php");

$user_id = $_POST['user_id'];

$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$query = "SELECT id, vardas, pavarde, sukaupta_atostogu, statusas "
            . "FROM " . TBL_DARBUOTOJAS . " WHERE id = $user_id";
	$result = mysqli_query($db, $query);
	if (!$result || (mysqli_num_rows($result) < 1))  
			{echo "Klaida skaitant lentelę `darbuotojas`"; exit;}
        $row = mysqli_fetch_array($result);
        mysqli_close($db);
$status = $row['statusas'];
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
                <td>Atostogų suteikimas darbuotojui</td>
            </tr>
        </table>
        <br>
        <?php 
            $AtostogaujanciuSk = $_SESSION['atos'];
            if(($status == "Dirba") && ($AtostogaujanciuSk < 2)){
                echo "<form action=\"suteiktiAtostogas.php\" method=\"post\">
                        <div class=\"container\">
                        <input type=\"id\" name=\"id\" value=\"$row[id]\" hidden=\"\" required=\"\">
                        <br>  
                        <label for=\"darbuotojas\"><b>Darbuotojas: </b></label>
                        $row[vardas] $row[pavarde]
                        <br>
                        <label for=\"atostogos\"><b>Sukaupta atostogų: </b></label>
                        $row[sukaupta_atostogu] d.d.
                        <input type=\"number\" name=\"atostogos\" value=\"$row[sukaupta_atostogu]\" hidden=\"\" required=\"\">
                        <br>
                        <label for=\"kiekis\"><b>Išleidžiamų atostogų dienų kiekis </b></label>
                        <input type=\"number\" name=\"kiekis\" min=\"3\" max=\"28\" maxLength=\"2\" required title=\"\">
                        <br>
                        <br>
                        <button type=\"submit\">Skirti atostogas</button>
                        </div>
                      </form>";
            }
            if($status == "Atostogauja"){
                echo "Atostogų šiam darbuotojui suteikti negalite - jis jau atostogauja!";
            }
            else{
                echo "Atostogų skirti negalite, nes šiuo metu atostogauja maksimalus kiekis darbuotojų!";
            }
        ?>
        <br><br>
        <div class="container" style="background-color:#f1f1f1">
            <button onclick="javascript:history.back()">Grįžti</button>
        </div>
    </center>
</body>

</html>