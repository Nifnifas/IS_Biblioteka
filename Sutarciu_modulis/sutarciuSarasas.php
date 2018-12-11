<?php
    require('./../Procesai/dbConnect.php');
    require('./../header.php');

    $query = "  SELECT `sutartis`.`Sutarties_Nr`, `sutartis`.`Sudarymo_data`, `sutartis`.`Isdavimo_data`, `sutartis`.`Grazinimo_data`, `sutartis`.`Terminas`, `klientas`.`Vardas`, `klientas`.`Pavarde`
                FROM `sutartis`, `klientas` 
                WHERE `klientas`.`id` = `sutartis`.`fk_KlientasID`;";
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
?>

    <center>
        <h2>Sutarčių sąrašas</h2>
        <a href="sutarciuRedagavimasIrRegistracija.php">Registruoti sutartį</a><br><br>
        <table border="1" cellpadding="10">
           <tr>
               <th>Nr</th><th>sudarymo data</th><th>išdavimo data</th><th>Grąžinimo data</th><th>Terminas</th><th>Klientas</th><th>Redaguoti</th><th>Šalinti</th>
           </tr>
           <?php
           while ($row = $result->fetch_assoc()) {
            $id = $row['Sutarties_Nr'];
             echo '<tr><td>'.$row['Sutarties_Nr'].'</td><td>'.$row['Sudarymo_data'].'</td><td>'.$row['Isdavimo_data'].'</td><td>'.$row['Grazinimo_data'].'</td><td>'.$row['Terminas'].'</td><td>'.$row['Vardas'].' '.$row['Pavarde'].'</td><td><form action="sutarciuRedagavimasIrRegistracija.php?id='.$id.'" method="post">
                            <button type="submit" name="edit-submit">Redaguoti</button>
                        </form></td><td><form action="Procesai/salintiSutarti.php?id='.$id.'" method="post">
                            <button type="submit" name="delete-submit">Šalinti</button>
                        </form></td></tr>';
           }
           ?>
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