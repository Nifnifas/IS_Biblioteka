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
        <h2>Rezervacijų sąrašas</h2>
        <table border="1" cellpadding="10">
            <tr>
                <td>NR</td><td>Kūrinys</td><td>prioritetas</td><td>rezervavimo data</td><td>Atšaukti</td>
            </tr>
            <tr>
                <td>1</td><td>Balta Drobulė</td><td>13</td><td>2017-01-16</td><td><button onclick="location.href='Sutarciu_modulis/sutarciuRedagavimasIrRegistracija.php'" type="button">Atšaukti</button></td>
            </tr>
            <tr>
                <td>2</td><td>Kiniškas Biliardas</td><td>1</td><td>2018-08-08</td><td><button onclick="location.href='Sutarciu_modulis/sutarciuRedagavimasIrRegistracija.php'" type="button">Atšaukti</button></td>
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