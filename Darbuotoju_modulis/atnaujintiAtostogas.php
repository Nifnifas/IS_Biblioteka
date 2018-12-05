    <?php

        // Create connection
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        // Check connection
        if (!$conn) {
            die("Klaida: " . mysqli_connect_error());
        }
            $uql = "UPDATE " . TBL_DARBUOTOJAS . " SET `sukaupta_atostogu`= `sukaupta_atostogu` + '$koef'"
                . " WHERE `id` = '$fk_id'";

    if (mysqli_query($conn, $uql)) {
        echo "<table border=\"1\" cellpadding=\"10\"><tr align=\"center\"><td>Darbuotojo sukauptos atostogos atnaujintos sėkmingai!</td></tr></table>";
    } else {
        echo "Klaida: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    ?>  