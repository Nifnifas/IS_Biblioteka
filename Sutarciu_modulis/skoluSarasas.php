<?php
    require('./../Procesai/dbConnect.php');
    require('./../header.php');

    $query = "  SELECT `skola`.`id`, `skola`.`Dydis`, `skola`.`Procentalumas`, `skola`.`Grazinimo_data`, `sutartis`.`Grazinimo_data` AS `Prasiskolinimo_data`, `sutartis`.`Sutarties_Nr`, `klientas`.`Vardas`, `klientas`.`Pavarde` 
                FROM `skola`, `klientas`, `sutartis` 
                WHERE `skola`.`fk_SutartisID` = `sutartis`.`Sutarties_Nr` AND `sutartis`.`fk_KlientasID` = `klientas`.`id` 
                ORDER BY `skola`.`id`;";
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
?>

    <main>
        <center>
        <h2>Skolų sąrašas</h2>
        <table border="1" cellpadding="10">
            <tr>
                <th>Sutarties Nr.</th><th>Skolininkas</th><th>Skola</th><th>procentalumas</th><th>Prasiskolinimo data</th><th>Grąžinimo data</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()){
                echo '<tr><td>'.$row['Sutarties_Nr'].'</td><td>'.$row['Vardas'].' '.$row['Pavarde'].'</td><td>'.$row['Procentalumas'].'</td><td>'.$row['Dydis'].'</td><td>'.$row['Prasiskolinimo_data'].'</td>';
                if (isset($row['Grazinimo_data'])) {
                    echo '<td>'.$row['Grazinimo_data'].'</td></tr>';
                } else {
                    $id = $row['id'];
                    echo '<td><form action="Procesai/skolaGrazinta.php?id='.$id.'" method="post">
                            <button type="submit" name="delete-submit">Gražinta</button>
                        </form></td></tr>';
                }
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
</main>
</body>

</html>