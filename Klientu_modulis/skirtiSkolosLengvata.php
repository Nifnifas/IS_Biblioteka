<?php
session_start();
include("../nustatymai.php");

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME1);
mysqli_set_charset($db, "utf8");


?>

<html>
<head>
    <title>Bibliotekos informacinė sistema</title>
</head>

<body>
    <a href="/is_biblioteka/atsijungimas.php">Atsijungti</a><br/>
    <a href="/is_biblioteka/paskyrosRedagavimas.php">Redaguoti paskyrą</a><br/>
    <a href="/is_biblioteka/turimiTaskai.php">Turimi taškai</a><br/>
    <center>
        <h1>Bibliotekos informacinė sistema</h1>
        <table border="1" cellpadding="10">
            <tr align="center">
                
<?php
$user_id = $_SESSION['userId'];
$klientoID = "SELECT * FROM is_vartotojas WHERE id=$user_id";
$result = mysqli_query($db, $klientoID);
$row = $result->fetch_assoc();
$id = $row["kliento_id"];

$query = "SELECT * FROM klientas WHERE id=$id";
$result = mysqli_query($db, $query);
$row = $result->fetch_assoc();
$taskai = $row["Taskai"];
$kaina = 1;
if ($taskai >= $kaina)
{
$likeTaskai=$taskai-$kaina;
$query = "INSERT INTO lengvata VALUES (null, $kaina, '1', $id)";
$result = mysqli_query($db, $query);
$query = "UPDATE klientas SET Taskai='$likeTaskai' WHERE id=$id";
$result = mysqli_query($db, $query);
echo "<td>Jums buvo suteikta skolos lengvata</td>";
}
else 
{
    echo "<td>Jums nepakanka taškų</td>";
}
?>
                
                
            </tr>
        </table>
        <br>
        <div class="container" style="background-color:#f1f1f1">
            <button onclick="javascript:history.back()">Grįžti į pradžią</button>
        </div>
        </form>
    </center>
</body>

</html>