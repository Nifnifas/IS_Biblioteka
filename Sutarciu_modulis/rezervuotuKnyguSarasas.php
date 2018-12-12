<?php
    require('./../Procesai/dbConnect.php');
    require('./../header.php');

    $userId = $_SESSION['userId'];
    $query = "  SELECT `kurinys`.`Pavadinimas`, `kurinys`.`Autorius`, `rezervacija`.`id`, `rezervacija`.`Data`, `rezervacija`.`Prioritetas`
                FROM `kurinys`, `rezervacija`
                WHERE `rezervacija`.`fk_KurinysID` = `kurinys`.`id` AND `rezervacija`.`fk_KlientasID` = '$userId'";
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
?>
    <center>
        <h2>Rezervacijų sąrašas</h2>
        <table border="1" cellpadding="10">
            <tr>
                <th>NR</th><th>Autorius</th><th>Kūrinys</th><th>prioritetas</th><th>rezervavimo data</th><th>Atšaukti</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()){
                $id = $row['id'];
                echo '<tr><td>'.$row['id'].'</td><td>'.$row['Autorius'].'</td><td>'.$row['Pavadinimas'].'</td><td>'.$row['Prioritetas'].'</td><td>'.$row['Data'].'</td><td><form action="Procesai/atsauktiRezervacija.php?id='.$id.'" method="post">
                            <button type="submit" name="cancel-submit">Atšaukti</button>
                        </form></td></tr>';
            } ?>
        </table>
        <br>
        <?php echo ''; ?>
        <div class="container" style="background-color:#f1f1f1">
            <form action="../index.php">
                <button type="submit">Grįžti</button>
            </form>
        </div>
        </form>     
    </center>
</body>

</html>