<?php

echo "<head>";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>";
echo "<title>Registruoti naują renginį</title>";
echo "</head>";

echo "<a href='/is_biblioteka/atsijungimas.php'>Atsijungti</a><br/>";
echo "<a href='/is_biblioteka/paskyrosRedagavimas.php'>Redaguoti paskyrą</a><br/>";
echo "<a href='/is_biblioteka/turimiTaskai.php'>Turimi taškai</a><br/>";

 echo "<center>";
echo "<tr><td align='center'><h2>Renginio registravimas</h2></td></tr>";
 echo "<p></p>";
 

function renderForm($first, $last, $error)
{
  
  ?> 
  <form action="" method="post">

<div>

     <label for="title"><b>Pavadinimas</b></label>
    <input type="title"  name="title">
    <br>
    <label for="date"><b>Data</b></label>
    <input type="date"  name="date">
    <br>
    <label for="time"><b>Laikas</b></label>
    <input type="time"  name="time">
    <br>
    <label for="type"><b>Tipas</b></label>

    
    <select class="form-control" name="type">
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
    <input type="name"  name="name">
    <br>
    <label for="tel"><b>Organizatoriaus tel. nr.</b></label>
    <input type="tel" name="tel">
    <br>
    <label for="cost"><b>Bilieto kaina</b></label>
    <input type="cost"  name="cost">
    <br>
    <label for="seats"><b>Vietų skaičius</b></label>
    <input type="seats"  name="seats">
    <br>
    <br>
    <label align= "center" for="description"><b>Aprašymas</b></label>  <br>
    <textarea style="height: 150px; width: 350px" type="description"  name="description"></textarea>
    <br>

<p>* būtina užpildyti</p>

<input type="submit" name="submit" value="Sukurti įrašą">

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

//$combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));

$found = mysqli_query($db, "SELECT * FROM renginiai WHERE Data='$date'");

if(mysqli_num_rows($found) == 0) {
    
    $sql = "INSERT INTO renginiai (Pavadinimas, Data, Laikas, Organizatorius, Org_tel, Tipas, Kaina, Vietu_sk, Aprasymas)
    VALUES ('$title', '$date', '$time', '$name', '$tel', '$type', '$cost', '$seats', '$description')";
    
    if ($db->query($sql) === TRUE) {
    echo "Renginys sukurtas! Norėdami pamatyti sąraše, atnaujinkite sąrašo puslapį.";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

} else {
     echo "Negalima! Pasirinktą dieną vyks kitas renginys.";
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
   