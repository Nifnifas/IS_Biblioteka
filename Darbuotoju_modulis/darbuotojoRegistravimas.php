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
        <form action="javascript:history.back()">
            <div class="container">
            <label for="name"><b>Vardas</b></label>
            <input type="name"  name="name">
            <br>
            <label for="surname"><b>Pavardė</b></label>
            <input type="surname"  name="surname">
            <br>
            <label for="email"><b>El. paštas</b></label>
            <input type="email" name="email">
            <br>
            <label for="psw"><b>Slaptažodis</b></label>
            <input type="password"  name="psw">
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