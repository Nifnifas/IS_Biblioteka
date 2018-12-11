<?php
    session_start();
?>
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
        <?php

        include("../nustatymai.php");
        $id = $_POST['id'];
        $kiekis = $_POST['kiekis'];
        $sukaupta_atostogu = $_POST['atostogos'];
        $likutis = $sukaupta_atostogu - $kiekis;
        $today = date("Y-m-d");
        $dataIki = date('Y-m-d', strtotime($today . " + $kiekis days"));

        // Create connection
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        // Check connection
        if (!$conn) {
            die("Klaida: " . mysqli_connect_error());
        }
        if (($likutis >= 0) && ($kiekis > 0)){
            $sql = "UPDATE " . TBL_DARBUOTOJAS . " SET `sukaupta_atostogu`= '$likutis', `statusas`= 'Atostogauja', `statusas_iki`= '$dataIki'"
                . " WHERE `id` = '$id'";
            if(mysqli_query($conn, $sql)){
                echo "<table border=\"1\" cellpadding=\"10\"><tr align=\"center\"><td>Darbuotojas sėkmingai išleistas atostogų!</td></tr></table>";
                header( "refresh:1;url=darbuotojuSarasas.php");
            } else{
                echo "Klaida: $sql. " . mysqli_error($conn);
                header( "refresh:2;url=darbuotojuSarasas.php");
            }
        } else{
            echo "Klaida: Blogai įvestas dienų skaičius!";
            header( "refresh:2;url=darbuotojuSarasas.php");
        }
        mysqli_close($conn);
    ?>       
    </center>
</body>
</html>