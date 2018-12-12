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
        <table border="1" cellpadding="10">
            <tr align="center">
                <td><a href="Knygu_modulis/knyguSarasas.php">Knygų sąrašas</a></td>
                <?php if ($_SESSION['userLevel'] == 1) { ?>
                <td><a href="Sutarciu_modulis/pasiimtuKnyguSarasas.php">Paimtų knygų sąrašas</a></td> <?php } ?>
                <td><a href="ataskaituSarasas.php">Ataskaitų sąrašas</a></td>
                <td><?php if ($_SESSION['userLevel'] == 2) { ?><a href="Sutarciu_modulis/skoluSarasas.php">Skolų sąrašas</a><br/><?php } ?>
                    <?php if ($_SESSION['userLevel'] == 1) { ?><a href="Sutarciu_modulis/skolosLangas.php">Skolos langas</a></td><?php } ?>
                <td><?php if ($_SESSION['userLevel'] == 1) { ?><a href="Sutarciu_modulis/rezervuotuKnyguSarasas.php">Knygų rezervacijų sąrašas</a></td><?php } ?>
                <td><?php if ($_SESSION['userLevel'] == 1) { ?><a href="lengvatuSarasas.php">Lengvatų sąrašas</a></td><?php } ?>
                <?php if ($_SESSION['userLevel'] == 2) { ?><td><a href="Sutarciu_modulis/sutarciuSarasas.php">Sutarčių sąrašas</a></td><?php } ?>
                <?php if ($_SESSION['userLevel'] == 3) { ?><td><a href="Darbuotoju_modulis/darbuotojuSarasas.php">Darbuotojų sąrašas</a></td><?php } ?>
                <td><a href="Renginiu_modulis/renginiuKalendorius.php">Renginių kalendorius</a></td>
            </tr>
        </table>
    </center>
</body>

</html>