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
                <td>Čia bus galima suteikti atostogas norimam darbuotojui</td>
            </tr>
        </table>
        <br>
         <form action="">
            <div class="container">
              <label for="id"><b>Darbuotojo id</b></label>
              <input type="id"  name="id">
              <br>
              <button type="submit">Ieškoti</button>
            </div>
        </form>
        <?php include'darbuotojai.php'?>
                <div align="center" class="container">
                    <form action='atostoguForma.php'>
                        <button type="submit">Suteikti atostogas</button>
                    </form>
                </div>
                <br>
        <div align ="center" class="container" style="background-color:#f1f1f1">
            <button onclick="javascript:history.back()">Grįžti</button>
        </div>
    </center>
</body>

</html>