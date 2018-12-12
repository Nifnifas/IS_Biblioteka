<?php
    require('./../Procesai/dbConnect.php');
    require('./../header.php');

    $userId = $_SESSION['userId'];
    $query = "  SELECT `kurinys`.`Pavadinimas`, `kurinys`.`Autorius`, `sutartis`.`Sutarties_Nr`, `sutartis`.`Grazinimo_data`, `egzempliorius`.`id`
                FROM `kurinys`, `sutartis`, `egzempliorius`, `sutartis_egzempliorius` 
                WHERE `sutartis`.`Sutarties_Nr` = `sutartis_egzempliorius`.`fk_SutartisID` 
                  AND `sutartis_egzempliorius`.`fk_EgzemplioriusID` = `egzempliorius`.`id` 
                  AND `egzempliorius`.`fk_KurinysID` = `kurinys`.`id` 
                  AND `sutartis`.`fk_KlientasID` = '$userId'";
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
?>

    <center>
        <h2>Paimtų knygų sąrašas</h2>
        <table border="1" cellpadding="10">
           <tr>
               <th>Sutarties nr</th><th>Egzemplioriaus nr</th><th>Autorius</th><th>Kūrinys</th><th>Grąžinimo data</th>
           </tr>
           <?php while ($row = $result->fetch_assoc()){
                echo '<tr><td>'.$row['Sutarties_Nr'].'</td><td>'.$row['id'].'</td><td>'.$row['Autorius'].'</td><td>'.$row['Pavadinimas'].'</td><td>'.$row['Grazinimo_data'].'</td></tr>';
            } ?>
        </table>
        <br>
        <div class="container" style="background-color:#f1f1f1">
            <form action="../index.php">
                <button type="submit">Grįžti</button>
            </form>
        </div>
        </form>     
    </center>
</body>

</html>