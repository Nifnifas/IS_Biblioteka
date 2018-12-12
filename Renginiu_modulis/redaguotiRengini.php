<?php

echo "<head>";
    echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>";
 echo "<title>Redaguoti renginį</title>";
echo "</head>";

echo "<a href='/is_biblioteka/atsijungimas.php'>Atsijungti</a><br/>";
echo "<a href='/is_biblioteka/paskyrosRedagavimas.php'>Redaguoti paskyrą</a><br/>";
echo "<a href='/is_biblioteka/turimiTaskai.php'>Turimi taškai</a><br/>";

 echo "<center>";
echo "<tr><td align='center'><h2>Renginio redagavimas</h2></td></tr>";
 echo "<p></p>";
 
session_start();

function renderForm($first, $last, $error)
{
   
  ?> 
  <form action="" method="post">

<div>
     <label for="title"><b>Pavadinimas</b></label>
    <input type="title"  name="title" value=" <?php echo $_SESSION['Pavadinimas'];?>">
    <br>
    <label for="date"><b>Data</b></label>
    <input type="date"  name="date">
    <br>
    <label for="time"><b>Laikas</b></label>
    <input type="time"  name="time">
    <br>
    <label for="type"><b>Tipas</b></label>

    
    <select class="form-control" name="type" value=" <?php echo $_SESSION['Tipas'];?>">
         <?php 
         
          include("../nustatymai.php");
        $db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);


         $result = mysqli_query($db,"SELECT id, Tipas FROM renginiu_tipai");

         while($row = mysqli_fetch_array($result)) 
            echo "<option value='" . $row['id'] . "'>" . $row['Tipas'] . "</option>";
         ?>
     </select>
    <br>
    <label for="name"><b>Organizatorius</b></label>
    <input type="name"  name="name" value=" <?php echo $_SESSION['Organizatorius'];?>">
    <br>
    <label for="tel"><b>Organizatoriaus tel. nr.</b></label>
    <input type="tel" name="tel" value=" <?php echo $_SESSION['Org_tel'];?>">
    <br>
    <label for="cost"><b>Bilieto kaina</b></label>
    <input type="cost"  name="cost"  value=" <?php echo $_SESSION['Kaina'];?>">
    <br>
    <label for="seats"><b>Vietų skaičius</b></label>
    <input type="seats"  name="seats"  value=" <?php echo $_SESSION['Vietu_sk'];?>">
    <br>
    <br>
    <label align= "center" for="description"><b>Aprašymas</b></label>  <br>
    <textarea style="height: 150px; width: 350px" type="description"  name="description"><?php echo $_SESSION['Aprasymas'];?></textarea>
    <br>

<input type="submit" name="submit" value="Redaguoti">

</div>

</form>
         
   <?php      
}


    include("../nustatymai.php");
$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 

if (isset($_POST['submit']))

{
$title= $_POST['title'];
$name= $_POST['name'];
$date= $_POST['date'];
$time= $_POST['time'];
$tel= $_POST['tel'];
$cost= $_POST['cost'];
$seats= $_POST['seats'];
$description= $_POST['description'];
$type = $_POST['type'];
$id = $_SESSION['id'];
$kiekRezervuota = $_SESSION['Kiek_rezervuota'];

//$combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));

$found = mysqli_query($db, "SELECT * FROM renginiai WHERE Data='$date'");

if(mysqli_num_rows($found) == 0 && $seats >= $kiekRezervuota) {
    
   $sql = "UPDATE renginiai SET Pavadinimas='$title', Organizatorius='$name', Data='$date', Laikas='$time', Org_tel='$tel', Kaina='$cost', Vietu_sk='$seats', Aprasymas='$description', Tipas='$type' WHERE id='$id'";
    
    if ($db->query($sql) === TRUE) {
    echo "Renginio informacija sėkmingai pakeista!";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

} else if (mysqli_num_rows($found) > 0) {
     echo "Negalima! Pasirinktą dieną vyks kitas renginys.";
}  else
{
    echo "Negalima daugiau sumažinti vietų skaičiaus, nes visos yra rezervuotos!";
}

$db->close();
}
else

// if the form hasn't been submitted, display the form
{

renderForm('','','');

}

  echo "<br>";
   echo "<div class='container' style='background-color:#f1f1f1'>";
   echo "<button onclick='javascript:history.back()'>Grįžti</button>";
  echo "</div>";
  
  ?> 
   