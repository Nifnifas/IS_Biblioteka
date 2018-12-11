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
                <td>Čia bus galima pridėti naują darbuotoją prie sistemos</td>
            </tr>
        </table>
        <br>
        <form action="registracijaDarbuotojo.php" method="post">
            <div class="container">
            <label for="vardas"><b>Vardas</b></label>
            <input type="vardas"  name="vardas">
            <br>
            <label for="pavarde"><b>Pavardė</b></label>
            <input type="pavarde"  name="pavarde">
            <br>
            <label for="asmens_kodas"><b>Asmens kodas</b></label>
            <input type="asmens_kodas" name="asmens_kodas">
            <br>
            <label for="tel_nr"><b>Telefono nr.</b></label>
            <input type="tel_nr" name="tel_nr">
            <br>
            <label for="adresas"><b>Adresas</b></label>
            <input type="adresas" name="adresas">
            <br>
            <label for="el_pastas"><b>El. paštas</b></label>
            <input type="el_pastas" name="el_pastas">
            <br>
            <label for="data"><b>Įdarbinimo data</b></label>
            <input type="date" id="data" name="data" class="textbox date textbox-70">
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
