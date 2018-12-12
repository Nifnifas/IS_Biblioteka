<?php
    session_start();
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
                <td>Registruoti naują darbuotoją</td>
            </tr>
        </table>
        <br>
        <form action="registracijaDarbuotojo.php" method="post">
            <div class="container">
            <label for="vardas"><b>Vardas</b></label>
            <input type="text"  name="vardas" pattern=".{3,20}" required title="">
            <br>
            <label for="pavarde"><b>Pavardė</b></label>
            <input type="text"  name="pavarde" pattern=".{4,20}" required title="">
            <br>
            <label for="asmens_kodas"><b>Asmens kodas</b></label>
            <input type="number" name="asmens_kodas" min="30001010000" max="69912319999" pattern=".{11,11}" required title="">
            <br>
            <label for="tel_nr"><b>Telefono nr.</b></label>
            +370<input type="number" name="tel_nr" min="60000000" max="69999999" pattern=".{8,8}" required title="">
            <br>
            <label for="adresas"><b>Adresas</b></label>
            <input type="adresas" name="adresas" pattern=".{8, 30}" required title="">
            <br>
            <label for="el_pastas"><b>El. paštas</b></label>
            <input type="email" name="el_pastas" pattern=".{3,30}" required title="">
            <br>
            <label for="vartotojas"><b>Priskirti vartotoją</b></label>
            <select name="vartotojas" required="">
            <?php
                include("../nustatymai.php");
                // Create connection
                $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                    $sql_u = "SELECT id, vardas, darbuotojo_id FROM " . TBL_VARTOTOJAI;
                    $res_u = mysqli_query($conn, $sql_u);
						$teams = $res_u;
                                                echo "<option value=\"\">";
						foreach($teams as $key => $val) {
							$selected = "";
							if(isset($data['id']) && $data['id'] == $val['id']) {
								$selected = " selected='selected'";
							}
                                                        if(is_null($val['darbuotojo_id'])){
                                                            echo "<option{$selected} value='{$val['id']}'>{$val['vardas']}</option>";
                                                        }
						}
					?>
            </select>
            <br>
            <?php
                $today = date("Y-m-d");
                $minDate = date('Y-m-d', strtotime($today. ' - 7 days'));
                $maxDate = date('Y-m-d', strtotime($today. ' + 14 days'));
                
            echo "<label for=\"data\"><b>Įdarbinimo data</b></label>
            <input type=\"date\" id=\"data\" name=\"data\" class=\"textbox date textbox-70\" min=\"$minDate\" max=\"$maxDate\" value=\"$today\" required=\"\">"
            ?>
            <br>
            <br>
            <button type="submit">Registruoti</button>
            </div>
        </form>   
                <br>
        <div class="container" style="background-color:#f1f1f1">
            <a href="/is_biblioteka/Darbuotoju_modulis/darbuotojuSarasas.php">Grįžti</a><br/>
        </div>
    </center>
</body>

</html>
