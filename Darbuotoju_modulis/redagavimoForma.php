<?php

include("../nustatymai.php");

$user_id = $_POST['user_id'];

$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$query = "SELECT id, vardas, pavarde, tel_nr, adresas, asmens_kodas, el_pastas "
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
                <td>Darbuotojo redagavimas</td>
            </tr>
        </table>
        <br>
        <form action="redagavimasDarbuotojo.php" method="post">
            <div class="container">
            <input type="id" name="id" value="<?php echo $row['id']; ?>" hidden="">
            <br>  
            <label for="vardas"><b>Vardas</b></label>
            <input type="vardas"  name="vardas" value="<?php echo $row['vardas']; ?>">
            <br>
            <label for="pavarde"><b>Pavardė</b></label>
            <input type="pavarde"  name="pavarde" value="<?php echo $row['pavarde']; ?>">
            <br>
            <label for="asmens_kodas"><b>Asmens kodas</b></label>
            <input type="asmens_kodas" name="asmens_kodas" value="<?php echo $row['asmens_kodas']; ?>">
            <br>
            <label for="tel_nr"><b>Telefono nr.</b></label>
            <input type="tel_nr" name="tel_nr" value="<?php echo $row['tel_nr']; ?>">
            <br>
            <label for="adresas"><b>Adresas</b></label>
            <input type="adresas" name="adresas" value="<?php echo $row['adresas']; ?>">
            <br>
            <label for="el_pastas"><b>El. paštas</b></label>
            <input type="el_pastas" name="el_pastas" value="<?php echo $row['el_pastas']; ?>">
            <br>
            <br>
            <button type="submit">Atnaujinti duomenis</button>
            </div>
        </form>   
                <br>
        <div class="container" style="background-color:#f1f1f1">
            <button onclick="javascript:history.back()">Grįžti</button>
        </div>
    </center>
</body>

</html>