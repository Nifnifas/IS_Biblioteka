<?php
    require "./../header.php";
    require('./../Procesai/dbConnect.php');

    if (isset($_POST)) {
        if ($_POST['create-submit'] == "add") {
            $books++;
        }
    }
?>

<main>
    <center>
        <h2>Sutarčių kūrimo ir redagavimo langas</h2>
    </center>
    <form action="sutarciuRedagavimasIrRegistracija.php" method="POST">
        <fieldset>
            Klientas<br>
            <input type="text"><br><br>
            Išdavimo data<br>
            <input type="text"><br><br>
            Grąžinimo data<br>
            <input type="text"><br><br>
            Terminas<br>
            <input type="text">
        </fieldset>
        <fieldset>
            Kūriniai<br>
            <?php for ($i=0; $i < $books; $i++) { 
                echo '<input type="text"><br>';
            } ?>
            <button type="submit" name="create-submit" value="add">Papildomas kūrinys</button>
        </fieldset>
        <button type="submit" name="create-submit" value="create">Sukurti</button>
    </form>
        <br>
    <div class="container" style="background-color:#f1f1f1">
        <form action="sutarciuSarasas.php">
            <button type="submit">Grįžti</button>
        </form>
    </div>
    </form>  
</main>   
</body>

</html>