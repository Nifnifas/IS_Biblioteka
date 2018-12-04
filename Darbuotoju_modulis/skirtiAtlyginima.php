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
        $fk_id = $_POST['id'];
        $data = date("Y-m-d");
        $tarifas = $_POST['tarifas'];
        $valandu_sk = $_POST['valandos'];
        $mokesciai = $_POST['mokesciai'];
        $ismokamas = $_POST['toPay'];
        $apskaiciuotas = $_POST['total'];
        $premija = $_POST['premija'];

        // Create connection
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        // Check connection
        if (!$conn) {
            die("Klaida: " . mysqli_connect_error());
        }

            $sql = "INSERT INTO " . TBL_ATLYGINIMAS . " (
            data, 
            tarifas, 
            valandu_sk, 
            psd_mokesciai,
            ismokamas,
            apskaiciuotas,
            premija,
            fk_Darbuotojasid
        )
        VALUES (
            '$data',
                '$tarifas',
                    '$valandu_sk',
                        '$mokesciai',
                            '$ismokamas',
                                '$apskaiciuotas',
                                    '$premija',
                                        '$fk_id'

            )";

    if (mysqli_query($conn, $sql)) {
        echo "<table border=\"1\" cellpadding=\"10\"><tr align=\"center\"><td>Darbuotojas gavo algalapį sėkmingai!</td></tr></table>";
        header( "refresh:1;url=darbuotojuSarasas.php");
    } else {
        echo "Klaida: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    ?>         
    </center>
</body>

</html>