<?php

include("../nustatymai.php");

$user_id = $_POST['user_id'];

$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$query = "SELECT id, vardas, pavarde, sukaupta_atostogu "
            . "FROM " . TBL_DARBUOTOJAS . " WHERE id = $user_id";
	$result = mysqli_query($db, $query);
	if (!$result || (mysqli_num_rows($result) < 1))  
			{echo "Klaida skaitant lentelę `darbuotojas`"; exit;}
        $row = mysqli_fetch_array($result);
        mysqli_close($db);
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
        <form action="suteiktiAtostogas.php" method="post">
            <div class="container">
            <input type="id" name="id" value="<?php echo $row['id']; ?>" hidden="">
            <br>  
            <label for="darbuotojas"><b>Darbuotojas: </b></label>
            <?php echo "$row[vardas] $row[pavarde]"?>
            <br>
            <label for="atostogos"><b>Sukaupta atostogų: </b></label>
            <?php echo "$row[sukaupta_atostogu] d.d."?>
            <input type="atostogos" name="atostogos" value="<?php echo $row['sukaupta_atostogu']; ?>" hidden="">
            <br>
            <label for="kiekis"><b>Išleidžiamų atostogų dienų kiekis </b></label>
            <input type="kiekis" name="kiekis">
            <br>
            <br>
            <button type="submit">Skirti atostogas</button>
            </div>
        </form>   
                <br>
        <div class="container" style="background-color:#f1f1f1">
            <button onclick="javascript:history.back()">Grįžti</button>
        </div>
    </center>
</body>

</html>