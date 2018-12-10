<?php
    $id = $_SESSION['iden'];
        // Create connection
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        // Check connection
        if (!$conn) {
            die("Klaida: " . mysqli_connect_error());
        }

        $sql = "UPDATE " . TBL_DARBUOTOJAS . " SET `statusas`= 'Dirba', `statusas_iki`= 'NULL'"
                . " WHERE `id` = '$id'";

        if(mysqli_query($conn, $sql)){
        } else{
            echo "Klaida: $sql. " . mysqli_error($conn);
        }

        mysqli_close($conn);
?>
