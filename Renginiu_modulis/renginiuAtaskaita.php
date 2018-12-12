<?php 
session_start();
include("../nustatymai.php");
$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
?> 

<html>
<head>
    <title>Renginių ataskaitos</title>
</head>

<body>
    <a href="/is_biblioteka/atsijungimas.php">Atsijungti</a><br/>
    <a href="/is_biblioteka/paskyrosRedagavimas.php">Redaguoti paskyrą</a><br/>
    <a href="/is_biblioteka/turimiTaskai.php">Turimi taškai</a><br/>
    <center>
        <h1>Renginių ataskaitos</h1>
         <h3>Populiariausių renginių TOP 10</h3>
        <form action="renginiuAtaskaita.php" method="post">
        <input type="submit" name="submit" value="Pagal apsilankymus">
        <input type="submit" name="submit2" value="Pagal rezervacijas">
        <br>
         <h3>Visi renginiai pasirinktu laiko tarpu</h3>
        <input type="date"  name="date1">
        -
         <input type="date"  name="date2">
          <br> <br>
         <input type="submit" name="submit3" value="Rodyti">
          <table border="1" cellpadding="10">
            <tr align="center">
     
<?php
   if (isset($_POST['submit'])) {  

      echo "<br> <br>";
    echo "<h3>Renginių TOP 10 pagal apsilankymus</h3>";
    
    $query = "SELECT * FROM renginiai ORDER BY Kiek_apsilankymu desc";
    $result = mysqli_query($db, $query);
    echo "<tr><td>Renginys</td><td>Apsilankymai</td></tr>";
    $amount = 0;
    while (($row = mysqli_fetch_assoc($result)) != null && $amount < 10){
	echo "<tr>";
	echo "<td>";
		echo "<input type='hidden' name='id' value='".$row["id"]."'/>";
                echo "<a href='renginioInformacija.php?id=".$row['id']."'>" . $row['Pavadinimas'] . "</a> ";
		echo "</form>";
	echo "</td>";
        echo "<td>".$row['Kiek_apsilankymu']."</td>";
          $amount++;
}
        echo "</tr>";
        echo "</table>";
         echo "</tr>";
    
  
  }
  else if (isset($_POST['submit2'])) {  

      echo "<br> <br>";
    echo "<h3>Renginių TOP 10 pagal rezervacijas</h3>";
    
    $query = "SELECT * FROM renginiai ORDER BY Kiek_rezervuota desc";
    $result = mysqli_query($db, $query);
    echo "<tr><td>Renginys</td><td>Rezervacijos</td></tr>";
    $amount = 0;
    while (($row = mysqli_fetch_assoc($result)) != null && $amount < 10){
	echo "<tr>";
	echo "<td>";
		echo "<input type='hidden' name='id' value='".$row["id"]."'/>";
                echo "<a href='renginioInformacija.php?id=".$row['id']."'>" . $row['Pavadinimas'] . "</a> ";
		echo "</form>";
	echo "</td>";
        echo "<td>".$row['Kiek_rezervuota']."</td>";
          $amount++;
}
        echo "</tr>";
        echo "</table>";
         echo "</tr>";
    
    
  }
    else if (isset($_POST['submit3'])) {  

    echo "<br> <br>";
    $date1= $_POST['date1'];
    $date2= $_POST['date2'];
    echo "<h3>Visi renginiai     (" . $date1 . " / " . $date2 . ")</h3>";
    
    
    if ($date1 == false && $date2 == false)
        {$query = "SELECT * FROM renginiai ORDER BY Data asc ";}
    else {$query = "SELECT * FROM renginiai WHERE $date1 <= Data AND Data <= $date2 ORDER BY Data asc ";}
    $result = mysqli_query($db, $query); 
    
    if ($result != false)
    {
    echo "<tr><td>Renginys</td><td>Data</td></tr>";
    $amount = 0;
    while (($row = mysqli_fetch_assoc($result)) != null){
	echo "<tr>";
	echo "<td>";
		echo "<input type='hidden' name='id' value='".$row["id"]."'/>";
                echo "<a href='renginioInformacija.php?id=".$row['id']."'>" . $row['Pavadinimas'] . "</a> ";
		echo "</form>";
	echo "</td>";
        echo "<td>".$row['Data']."</td>";
          $amount++;
}
        echo "</tr>";
        echo "</table>";
         echo "</tr>";
    }
  }
?>
     
            <br>
        <br>
        <div class="container" style="background-color:#f1f1f1">
            <a href="../index.php">Grįžti</button>
        </div>
    </center>
</body>

</html>