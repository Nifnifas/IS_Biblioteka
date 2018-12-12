<?php
require('Sutarciu_modulis/Procesai/skaiciuotiSkolas.php');
?>
<html>
<head>
    <title>Bibliotekos informacinė sistema</title>
</head>

<body>
    <a href="atsijungimas.php">Atsijungti</a><br/>
    <a href="paskyrosRedagavimas.php">Redaguoti paskyrą</a><br/>
    <a href="turimiTaskai.php">Turimi taškai</a><br/>
    <center>
        <h1>Bibliotekos informacinė sistema</h1>
        <?php
        if (isset($_SESSION['userId'])) {
            echo '<p>tu esi prisijungęs lopeta</p>';
        }
        else {
            echo '<p>tu esi atsijungęs kalioše</p>';
        }
        ?>
        <table border="1" cellpadding="10">
            <tr align="center">
                <td><a href="Knygu_modulis/knyguSarasas.php">Knygų sąrašas</a></td>
                <td>Klientams:<br/><a href="Sutarciu_modulis/pasiimtuKnyguSarasas.php">Paimtų knygų sąrašas</a></td>
                <td><a href="ataskaituSarasas.php">Ataskaitų sąrašas</a></td>
                <td>Darbuotojams:<br/><a href="Sutarciu_modulis/skoluSarasas.php">Skolų sąrašas</a><br/>
                    Klientams:<br/><a href="Sutarciu_modulis/skolosLangas.php">Skolos langas</a></td>
                <td>Klientams:<br/><a href="Sutarciu_modulis/rezervuotuKnyguSarasas.php">Knygų rezervacijų sąrašas</a></td>
                <td>Klientams:<br/><a href="lengvatuSarasas.php">Lengvatų sąrašas</a></td>
                <td>Darbuotojams:<br/><a href="Sutarciu_modulis/sutarciuSarasas.php">Sutarčių sąrašas</a></td>
                <td>Direktoriui:<br/><a href="Darbuotoju_modulis/darbuotojuSarasas.php">Darbuotojų sąrašas</a></td>
                <td><a href="Renginiu_modulis/renginiuKalendorius.php">Renginių kalendorius</a></td>
            </tr>
        </table>
    </center>
    <form method="post" action="Sutarciu_modulis/Procesai/rezervuoti.php?book=2">
        <button type="submit" name="register-submit">teip!</button>
    </form>
</body>

</html>