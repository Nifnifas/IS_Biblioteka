<?php

echo "<head>";
    echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>";
 echo "<title>Registruoti naują renginį</title>";
echo "</head>";

echo "<a href='/is_biblioteka/atsijungimas.php'>Atsijungti</a><br/>";
echo "<a href='/is_biblioteka/paskyrosRedagavimas.php'>Redaguoti paskyrą</a><br/>";
echo "<a href='/is_biblioteka/turimiTaskai.php'>Turimi taškai</a><br/>";

 echo "<center>";
 
session_start();
include("../nustatymai.php");
$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$req_id = $_SESSION['id'];
if (!isset($req_id)){
	header("Location: renginiuKalendorius.php");
	die();
}
$p_id = mysqli_real_escape_string($db, $req_id);

$query = "SELECT * FROM renginiai WHERE id = $p_id";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
echo "<tr><td align='center'><h2>".$row["Pavadinimas"]."</h2></td></tr>";
$date = new DateTime($row["Data"]);
$time = new DateTime($row["Laikas"]);
echo "<tr><td align='center'><h4>".$date->format('Y-m-d').", ".$time->format('H:i')."</h4></td></tr>";

if (isset($_POST['submit']))
{

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    
$id = $row["id"];
$sql = "DELETE FROM renginiai WHERE id=$id";


        
if ($db->query($sql) === TRUE) {
    echo "Įrašas ištrintas!";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

header("Location: renginiuKalendorius.php");
die();
}
else

// if the form hasn't been submitted, display the form
{

if ($row["Kaina"] != 0 && $row["Kiek_rezervuota"] > 0)
{renderFormNegalima('','','');}
else {renderFormTrinti('','','');}


}

function renderFormNegalima($first, $last, $error)
{
  
?>

 <form action="" method="post">
            Negalima ištrinti! Jau yra nupirktų bilietų.
        <br>
        <br>
</body>

</html>

   <?php      
}



function renderFormTrinti($first, $last, $error)
{
  
?>

 <form action="" method="post">
            Ar tikrai norite naikinti?
        <br>
        <br>
        <input type="submit" name="submit" value="Naikinti įrašą">
        <br>
        <br>
</body>

</html>

   <?php      
}



  echo "<br>";
   echo "<div class='container' style='background-color:#f1f1f1'>";
   echo "<a href='/is_biblioteka/Renginiu_modulis/renginiuKalendorius.php'>Grįžti</a><br/>";
   
  echo "</div>";
  
  ?> 