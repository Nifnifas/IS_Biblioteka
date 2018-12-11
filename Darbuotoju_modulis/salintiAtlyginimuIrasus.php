        <?php
              // Create connection
              $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
              // Check connection
              if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
              }
              $id = $_SESSION['iden'];
              $sql = "DELETE FROM " . TBL_ATLYGINIMAS . " WHERE fk_DarbuotojasID = $id";
              if(mysqli_query($conn, $sql)){
                  echo "<table border=\"1\" cellpadding=\"10\"><tr align=\"center\"><td>Atlyginimų įrašai sistemoje sėkmingai pašalinti!</td></tr></table>";
              } else{
                  echo "Klaida: $sql. " . mysqli_error($conn);
              }
              mysqli_close($conn);
        ?> 