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
                <td>Čia bus galima ištrinti norimą darbuotoją iš sistemos</td>
            </tr>
        </table>
        <br>
         <form action="javascript:history.back()">
            <div class="container">
              <label for="id"><b>Darbuotojo id</b></label>
              <input type="id"  name="id">
              <br>
              <button type="submit">Ieškoti</button>
            </div>
        <br>
        <div class="container" style="background-color:#f1f1f1">
            <button onclick="javascript:history.back()">Grįžti į pradžią</button>
        </div>
        </form>     
    </center>
</body>

</html>