<?php
session_start();
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
                <input type="id" name="id" value="<?php echo $row['id']; ?>" hidden="" required="">
            <br>  
            <label for="vardas"><b>Vardas</b></label>
            <input type="text"  name="vardas" value="<?php echo $row['vardas']; ?>" pattern=".{3,20}" required title="">
            <br>
            <label for="pavarde"><b>Pavardė</b></label>
            <input type="text"  name="pavarde" value="<?php echo $row['pavarde']; ?>" pattern=".{4,20}" required title="">
            <br>
            <label for="asmens_kodas"><b>Asmens kodas</b></label>
            <input type="number" name="asmens_kodas" value="<?php echo $row['asmens_kodas']; ?>" min="30001010000" max="69912319999" pattern=".{11,11}" required title="">
            <br>
            <label for="tel_nr"><b>Telefono nr.</b></label>
            +370<input type="number" name="tel_nr" value="<?php echo $row['tel_nr']; ?>" min="60000000" max="69999999" pattern=".{8,8}" required title="">
            <br>
            <label for="adresas"><b>Adresas</b></label>
            <input type="text" name="adresas" value="<?php echo $row['adresas']; ?>" pattern=".{8, 30}" required title="">
            <br>
            <label for="el_pastas"><b>El. paštas</b></label>
            <input type="email" name="el_pastas" value="<?php echo $row['el_pastas']; ?>" pattern=".{3,30}" required title="">
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