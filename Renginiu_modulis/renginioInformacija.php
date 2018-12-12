<?php
session_start();
include("../nustatymai.php");

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

echo "<head>";
    echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>";
 echo "<title>Renginio informacija</title>";
echo "</head>";


$req_id = $_REQUEST["id"];
if (!isset($req_id)){
	header("Location: renginiuKalendorius.php");
	die();
}
$p_id = mysqli_real_escape_string($db, $req_id);

$query = "SELECT * FROM renginiai WHERE id = $p_id";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

$apsilankymai = $row["Kiek_apsilankymu"] + 1;
$sql = "UPDATE renginiai SET Kiek_apsilankymu='$apsilankymai' WHERE id='$p_id'";
$resultApsilankymai = mysqli_query($db, $sql);

echo "<a href='/is_biblioteka/atsijungimas.php'>Atsijungti</a><br/>";
echo "<a href='/is_biblioteka/paskyrosRedagavimas.php'>Redaguoti paskyrą</a><br/>";
echo "<a href='/is_biblioteka/turimiTaskai.php'>Turimi taškai</a><br/>";
 echo "<center>";
echo "<tr><td align='center'><h2>".$row["Pavadinimas"]."</h2></td></tr>";
$date = new DateTime($row["Data"]);
$time = new DateTime($row["Laikas"]);
echo "<tr><td align='center'><h3>".$date->format('Y-m-d').", ".$time->format('H:i')."</h3></td></tr>";

$query = "SELECT renginiu_tipai.Tipas FROM renginiu_tipai INNER JOIN renginiai ON renginiai.Tipas = renginiu_tipai.id";

$result = mysqli_query($db, $query);
$row2 = mysqli_fetch_assoc($result);

echo "<b>Renginio tipas: </b>".$row2["Tipas"]."<br>";
echo "<b>Organizatorius: </b>".$row["Organizatorius"]."<br><br>";
            
            if ($_SESSION['userLevel'] == 2) {
echo  "<table border='1' cellpadding='10'>";
                
                echo  "<tr align='center'>";
if ($row["Kaina"] == 0)
{
    echo "<td>Renginys nemokamas: <a href='rezervuotiVieta.php'>rezervuoti vietą</a></td>";

    
      echo "</tr>";
      echo "<td align='center' colspan='3'><a href='atsauktiRezervacija.php'>Atšaukti rezervaciją</a></td>";
}
else {
    
    $date = date('Y-m-d H:i:s');
    $date2 = new DateTime($row["Data"]);
    date_default_timezone_set('Europe/Vilnius');
    $diff = abs(strtotime($row["Data"]) - strtotime($date));
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
   
 
echo "<td align='center'>".$row["Kaina"]." EUR</td>";
echo "<td><a href='pirktiBilieta.php'>Pirkti bilietą</a></td>";

 if ($years > 0 || $months > 0 || $days > 5)
  {
      echo "</tr>";
      echo "<td align='center' colspan='3'><a href='atsauktiRezervacija.php'>Grąžinti bilietą</a></td>";
  }
}
echo "</tr>";

echo "</table>";
echo "<p></p>";



echo "<table border='1' cellpadding='10'>";
echo "<td align='center' colspan='2' width='400'>".$row["Aprasymas"]."</a></td>";
echo "</table>";


echo "<p></p>";

}
        else if ($_SESSION['userLevel'] == 1) {
       
            $_SESSION['id'] = $row['id'];
             $_SESSION['Pavadinimas'] = $row['Pavadinimas'];
              $_SESSION['Organizatorius'] = $row['Organizatorius'];
               $_SESSION['Tipas'] = $row['Tipas'];
                $_SESSION['Org_tel'] = $row['Org_tel'];
                $_SESSION['Kaina'] = $row['Kaina'];
                $_SESSION['Vietu_sk'] = $row['Vietu_sk'];
                $_SESSION['Data'] = $row['Data'];
                $_SESSION['Laikas'] = $row['Laikas'];
                $_SESSION['Aprasymas'] = $row['Aprasymas'];
                $_SESSION['Kiek_rezervuota'] = $row['Kiek_rezervuota'];
                
          echo "<a href='redaguotiRengini.php?id=".$row['id']."'>Redaguoti renginio informaciją</a></br>";
          echo "<a href='salintiRengini.php?id=".$row['id']."'>Šalinti renginį</a></br>";
               echo "<p></p>";
echo "<table border='1' cellpadding='10'>";
echo "<td align='center'><b>Renginio tipas</td>";
echo "<td align='center'><b>Organizatorius</td>";
echo "<td align='center'><b>Organizatoriaus tel. nr.</td>";
 echo "<td align='center'><b>Bilieto kaina</td>";
 echo "<td align='center'><b>Vietų skaičius</td>";
  echo "</tr>";
  echo "<td align='center'>".$row2["Tipas"]."</td>";
echo "<td align='center'>".$row["Organizatorius"]."</td>";
echo "<td align='center'>".$row["Org_tel"]."</td>";
echo "<td align='center'>".$row["Kaina"]."</td>";
echo "<td align='center'>".$row["Vietu_sk"]."</td>";
   echo "</tr>";
  echo "<td align='center' colspan='5' width='400'>".$row["Aprasymas"]."</a></td>";
  echo "</table>";
   }
  echo "<br>";
   echo "<div class='container' style='background-color:#f1f1f1'>";
   echo "<button onclick='javascript:history.back()'>Grįžti</button>";
  echo "</div>";
  
  ?>      