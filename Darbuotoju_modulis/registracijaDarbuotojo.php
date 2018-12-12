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
  $vartotojas = $_POST['vartotojas'];
  
    // Create connection
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
        $sql_u = "SELECT * FROM " . TBL_DARBUOTOJAS . " WHERE asmens_kodas='$asmens_kodas'";
  	$sql_e = "SELECT * FROM " . TBL_DARBUOTOJAS . " WHERE el_pastas='$el_pastas'";
  	$res_u = mysqli_query($conn, $sql_u);
  	$res_e = mysqli_query($conn, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	  echo "Toks asmens kodas jau yra užregistruotas!"; 	
          header( "refresh:2;url=darbuotojoRegistravimas.php");
  	}else if(mysqli_num_rows($res_e) > 0){
  	  echo "Toks el. paštas jau yra užregistruotas!"; 	
          header( "refresh:2;url=darbuotojoRegistravimas.php");
  	}else{
            $query = "INSERT INTO " . TBL_DARBUOTOJAS . " (
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
            if (mysqli_query($conn, $query)) {
                $get = "SELECT id FROM " . TBL_DARBUOTOJAS . " WHERE `asmens_kodas` = '$asmens_kodas'";
                $res_get = $res_u = mysqli_query($conn, $get);
                $row = $res_get->fetch_assoc();
                $sec = "UPDATE " . TBL_VARTOTOJAI . " SET `darbuotojo_id`= '$row[id]'"
                . " WHERE `id` = '$vartotojas'";
                mysqli_query($conn, $sec);
                 echo "<table border=\"1\" cellpadding=\"10\"><tr align=\"center\"><td>Darbuotojas sėkmingai užregistruotas!</td></tr></table>";
                header( "refresh:1;url=darbuotojuSarasas.php");
            } else {
                echo "Klaida: " . $query . "<br>" . mysqli_error($conn);
            }   
        }

    

    mysqli_close($conn);
?>

    </center>
</body>
</html>