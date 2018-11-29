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
                <td>Čia bus galima suteikti darbuotojui atostogas</td>
            </tr>
        </table>
        <br>
        <form action="suteiktiAtostogas.php">
            <div class="container">
            <label for="id"><b>Darbuotojo ID</b></label>
            <input type="id"  name="id" value="<?php echo $_POST['user_id']?>">
            <br>
            <label for="atostogos"><b>Sukaupta atostogų: </b></label>
            <input type="atostogos"  name="atostogos">
            <br>
            <label for="kiekis"><b>Išleidžiamų atostogų dienų kiekis </b></label>
            <input type="kiekis" name="kiekis">
            <br>
            <button type="submit">Skirti atostogas</button>
            </div>
        </form>   
                <br>
        <div class="container" style="background-color:#f1f1f1">
            <button onclick="javascript:history.back()">Grįžti</button>
        </div>
    </center>
</body>

</html>