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
        <h2>Sutarčių sąrašas</h2>
        <a href="sutarciuRedagavimasIrRegistracija.php">Registruoti sutartį</a>
        <table border="1" cellpadding="10">
           <tr>
               <td>Nr</td><td>sudarymo data</td><td>išdavimo data</td><td>Grąžinimo data</td><td>Terminas</td><td>Klientas</td><td>Redaguoti</td><td>Šalinti</td>
           </tr>
           <tr>
               <td>1</td><td>2018-09-01</td><td>2018-09-13</td><td>2018-10-04</td><td>31</td><td>Petras</td><td><button onclick="location.href='sutarciuRedagavimasIrRegistracija.php'" type="button">Redaguoti</button></td><td><input type="button" value="Šalinti"></td>
           </tr>
           <tr>
               <td>2</td><td>2018-10-04</td><td>2018-10-04</td><td></td><td>31</td><td>Antanas</td><td><button onclick="location.href='sutarciuRedagavimasIrRegistracija.php'" type="button">Redaguoti</button></td><td><input type="button" value="Šalinti"></td>
           </tr>
        </table>
        <br>
        <div class="container" style="background-color:#f1f1f1">
            <button onclick="javascript:history.back()">Grįžti į pradžią</button>
        </div>
        </form>     
    </center>
</body>

</html>