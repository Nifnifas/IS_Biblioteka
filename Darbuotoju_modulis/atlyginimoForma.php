<?php
session_start();
include("../nustatymai.php");

$user_id = $_POST['user_id'];

$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$query = "SELECT id, vardas, pavarde "
            . "FROM " . TBL_DARBUOTOJAS . " WHERE id = $user_id";
	$result = mysqli_query($db, $query);
	if (!$result || (mysqli_num_rows($result) < 1))  
			{echo "Klaida skaitant lentelę `darbuotojas`"; exit;}
        $row = mysqli_fetch_array($result);
        mysqli_close($db);
        
    $userName = $row['vardas'];
    $userSurname = $row['pavarde'];
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
                <td><?php echo "$userName $userSurname";?></td>
            </tr>
        </table>
        <?php include("atlyginimuSarasasShort.php");
                $today = date("Y-m-d");
                $nextPayment = date('Y-m-d', strtotime($paskAlgosData. ' + 14 days'));
                if($today < $nextPayment){
                    echo "<br><br>Alga šiam darbuotojui jau išmokėta. Sekančią algą galėsite mokėti $nextPayment";
                }
                else{
                            echo "<form action=\"skirtiAtlyginima.php\" method=\"post\">
                                        <div class=\"container\">
                                        <input type=\"id\" name=\"id\" value=\"$user_id\" hidden=\"\" required=\"\">
                                        <br>  
                                        <label for=\"tarifas\"><b>Tarifas</b></label>
                                        <input oninput=\"findTotal()\" type=\"number\"  name=\"tarifas\" class=\"alga\" value=\"2.55\" min=\"2.50\" max=\"4.55\" required title=\"\">
                                        <br>
                                        <label for=\"valandos\"><b>Valandu sk. </b></label>
                                        <input oninput=\"findTotal()\" type=\"number\" name=\"valandos\" class=\"alga\" value=\"160\" min=\"1\" max=\"190\" required title=\"\">
                                        <br>
                                        <label for=\"mokesciai\"><b>Mokesciai %</b></label>
                                        <input oninput=\"findTotal()\" type=\"number\" name=\"mokesciai\" class=\"alga\" value=\"9\" min=\"9\" max=\"15\" required title=\"\">
                                        <br>
                                        <label for=\"premija\"><b>Premija</b></label>
                                        <input oninput=\"findTotal()\" type=\"number\" name=\"premija\" class=\"alga\" value=\"0\" min=\"0\" max=\"300\" required title=\"\">
                                        <br>
                                        <label for=\"apskaiciuotas\"><b>Viso apskaičiuota:</b></label>
                                        <input onmouseover=\"findTotal()\" type=\"number\" name=\"total\" id=\"total\" value=\"408\" required title=\"\" readonly>
                                        <br>
                                        <label for=\"ismokamas\"><b>Išmokama:</b></label>
                                        <input onmouseover=\"findTotal()\" type=\"number\" name=\"toPay\" id=\"toPay\" value=\"371.28\" required title=\"\" readonly>
                                        <br>
                                        <br>
                                        <button type=\"submit\">Išmokėti</button>
                                        </div>
                                </form>";   
                }
        ?>
        <br>

                <script type="text/javascript">
                    function findTotal(){
                        var arr = document.getElementsByClassName('alga');
                        var total = parseFloat(arr[0].value) * parseFloat(arr[1].value) + parseFloat(arr[3].value);
                        document.getElementById('total').value = total;
                        document.getElementById('toPay').value = total - (total * parseFloat(arr[2].value) / 100);
                    }
                </script>

                <br><br>
    <div class="container" style="background-color:#f1f1f1">
        <button onclick="javascript:history.back()">Grįžti</button>
    </div>

</center>
</body>
</html>