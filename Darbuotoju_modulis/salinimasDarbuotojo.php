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
              $_SESSION['iden'] = $_POST['user_id'];
              include("salintiAtlyginimuIrasus.php");

              // Create connection
              $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
              // Check connection
              if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
              }
                $sec = "UPDATE " . TBL_VARTOTOJAI . " SET `darbuotojo_id` = DEFAULT"
                . " WHERE `darbuotojo_id` = '$_POST[user_id]'";
              
              if(mysqli_query($conn, $sec)){
                  $sql = "DELETE FROM " . TBL_DARBUOTOJAS . " WHERE id = $_POST[user_id]";
                  mysqli_query($conn, $sql);
                  echo "<table border=\"1\" cellpadding=\"10\"><tr align=\"center\"><td>Darbuotojas sėkmingai pašalintas iš sistemos!</td></tr></table>";
                  header( "refresh:2;url=darbuotojuSarasas.php");
              } else{
                  echo "Klaida: $sec. " . mysqli_error($conn);
              }
              mysqli_close($conn);
        ?>   
    </center>
</body>
</html>