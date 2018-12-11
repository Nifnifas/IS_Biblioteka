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
            <button onclick="javascript:history.back()">Grįžti</button>
        </div>
    </center>
</body>

</html>
