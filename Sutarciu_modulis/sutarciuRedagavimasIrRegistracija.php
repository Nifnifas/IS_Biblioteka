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
        <h2>Sutarčių kūrimo ir redagavimo langas</h2>
    </center>
    <form>
        <fieldset>
            Klientas<br>
            <input type="text"><br><br>
            Išdavimo data<br>
            <input type="text"><br><br>
            Grąžinimo data<br>
            <input type="text"><br><br>
            Terminas<br>
            <input type="text">
        </fieldset>
        <fieldset>
            Kūriniai<br>
            <input type="text">
        </fieldset>
        <button onclick="location.href='sutarciuSarasas.php'" type="button">Pateikti</button>
    </form>
        <br>
    <div class="container" style="background-color:#f1f1f1">
        <button onclick="javascript:history.back()">Grįžti į pradžią</button>
    </div>
    </form>     
</body>

</html>