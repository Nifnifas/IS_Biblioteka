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
        <form action="skirtiAtlyginima.php">
            <div class="container">
            <label for="valandos"><b>Valandu sk. </b></label>
            <input type="valandos"  name="valandos">
            <br>
            <label for="tarifas"><b>Tarifas</b></label>
            <input type="tarifas"  name="tarifas">
            <br>
            <label for="psd"><b>PSD</b></label>
            <input type="psd" name="psd">
            <br>
            <button type="submit">Išmokėti</button>
            </div>
        </form>   
                <br>
        <div class="container" style="background-color:#f1f1f1">
            <button onclick="javascript:history.back()">Grįžti</button>
        </div>
    </center>
</body>

</html>