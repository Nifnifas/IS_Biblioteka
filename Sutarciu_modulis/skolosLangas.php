<?php
    require('./../Procesai/dbConnect.php');
    require('./../header.php');

    $userId = $_SESSION['userId'];
    $query = "  SELECT `skola`.`Dydis`, `skola`.`Procentalumas`, DATE_ADD(`sutartis`.`Isdavimo_data`, INTERVAL `sutartis`.`Terminas` DAY) AS `pradzia` 
                FROM `skola`, `sutartis` 
                WHERE `skola`.`fk_SutartisID` = `sutartis`.`Sutarties_Nr` AND `sutartis`.`fk_KlientasID` = '$userId' AND `skola`.`Grazinimo_data` IS NULL
                ORDER BY `skola`.`id` ASC";

    $totalQuery = " SELECT SUM(`skola`.`Dydis`) AS suma 
                    FROM `skola`, `sutartis` 
                    WHERE `skola`.`fk_SutartisID` = `sutartis`.`Sutarties_Nr` AND `sutartis`.`fk_KlientasID` = '$userId' AND `skola`.`Grazinimo_data` IS NULL";

    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
    $totalresult = mysqli_query($connect, $totalQuery) or die(mysqli_error($connect));
?>
    <center>
        <h2>Skolos bibliotekai!</h2>
        <table border="1" cellpadding="10">
            <tr align="center"><th>Įsiskolinimo data</th><th>Skolos dydis</th><th>Procentalumas</th></tr>
                <?php while ($row = $result->fetch_assoc()){
                echo '<tr><td>'.$row['pradzia'].'</td><td>'.$row['Dydis'].'</td><td>'.$row['Procentalumas'].'</td></tr>';
            } ?>
        </table>
        <?php
        $total = mysqli_fetch_row($totalresult);
        echo '<h4>Pilna skolos suma: '.$total[0].' Eur</h4>';

        ?>
        <br>
        <div class="container" style="background-color:#f1f1f1">
            <form action="../index.php">
                <button type="submit">Grįžti</button>
            </form>
        </div>    
    </center>
</body>

</html>