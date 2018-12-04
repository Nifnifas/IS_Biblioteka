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
                <td>Čia bus galima skirti darbuotojui algą</td>
            </tr>
        </table>
        <br>
        <form action="skirtiAtlyginima.php" method="post">
            <div class="container">
            <input type="id" name="id" value="<?php echo $row['id']; ?>" hidden="">
            <br>  
            <label for="darbuotojas"><b>Darbuotojas: </b></label>
            <?php echo "$row[vardas] $row[pavarde]"?>
            <br>
            <label for="tarifas"><b>Tarifas</b></label>
            <input oninput="findTotal()" type="text"  name="tarifas" class="alga" value="<?php echo 2.55; ?>">
            <br>
            <label for="valandos"><b>Valandu sk. </b></label>
            <input oninput="findTotal()" type="valandos" name="valandos" class="alga" value="<?php echo 160; ?>">
            <br>
            <label for="mokesciai"><b>Mokesciai %</b></label>
            <input oninput="findTotal()" type="mokesciai" name="mokesciai" class="alga" value="<?php echo 9; ?>">
            <br>
            <label for="premija"><b>Premija</b></label>
            <input oninput="findTotal()" type="premija" name="premija" class="alga" value="<?php echo 0; ?>">
            <br>
            <label for="apskaiciuotas"><b>Viso apskaičiuota:</b></label>
            <input onmouseover="findTotal()" type="text" name="total" id="total" value="408" readonly>
            <br>
            <label for="ismokamas"><b>Išmokama:</b></label>
            <input onmouseover="findTotal()" type="text" name="toPay" id="toPay" value="371.28" readonly>
            <br>
            <br>
            <button type="submit">Išmokėti</button>
            </div>
        </form>   
            <br>
        <div class="container" style="background-color:#f1f1f1">
            <button onclick="javascript:history.back()">Grįžti</button>
        </div>

    <script type="text/javascript">
        function findTotal(){
            var arr = document.getElementsByClassName('alga');
            var total = parseFloat(arr[0].value) * parseFloat(arr[1].value) + parseFloat(arr[3].value);
            document.getElementById('total').value = total;
            document.getElementById('toPay').value = total - (total * parseFloat(arr[2].value) / 100);
        }
    </script>
    </center>
</body>
</html>