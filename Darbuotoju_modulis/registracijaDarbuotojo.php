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
  
  $vardas = $_POST['vardas'];
  $pavarde = $_POST['pavarde'];
  $el_pastas = $_POST['el_pastas'];
  $asmens_kodas = $_POST['asmens_kodas'];
  $tel_nr = $_POST['tel_nr'];
  $adresas = $_POST['adresas'];
  $data = $_POST['data'];
  
    // Create connection
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO " . TBL_DARBUOTOJAS . " (
            vardas, 
            pavarde, 
            tel_nr, 
            adresas,
            isidarbinimo_data,
            asmens_kodas,
            el_pastas
        )
        VALUES (
            '$vardas',
                '$pavarde',
                    '$tel_nr',
                        '$adresas',
                            '$data',
                                '$asmens_kodas',
                                    '$el_pastas'

            )";

    if (mysqli_query($conn, $sql)) {
        echo "<table border=\"1\" cellpadding=\"10\"><tr align=\"center\"><td>Darbuotojas sėkmingai užregistruotas!</td></tr></table>";
        header( "refresh:1;url=darbuotojuSarasas.php");
    } else {
        echo "Klaida: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>

    </center>
</body>
</html>