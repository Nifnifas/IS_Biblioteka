<html>
    <head>
        <title>Bibliotekos informacinė sistema</title>
    </head>
    <body>
        <center>
        <h1>Bibliotekos informacinė sistema</h1>
        </center>
    
    <form action="Procesai/registruoti.php" method="post">
  <div class="container">
    <label for="slapyvardis"><b>Prisijungimo vardas</b></label>
    <input type="text"  name="slapyvardis">
    <br>
    <label for="vardas"><b>Vardas</b></label>
    <input type="text"  name="vardas">
    <br>
    <label for="pavarde"><b>Pavardė</b></label>
    <input type="text"  name="pavarde">
    <br>
    <label for="pastas"><b>El. paštas</b></label>
    <input type="text" name="pastas">
    <br>
    <label for="telefonas"><b>Telefono numeris</b></label>
    <input type="text" name="telefonas">
    <br>
    <label for="adreesas"><b>Adresas</b></label>
    <input type="text" name="adreesas">
    <br>
    <label for="slaptazodis"><b>Slaptažodis</b></label>
    <input type="password"  name="slaptazodis">
    <br>
    <label for="slaptazodis-antras"><b>Pakartoti slaptažodį</b></label>
    <input type="password"  name="slaptazodis-antras">
    <br>
    <button type="submit" name="signup-submit">Registruotis</button>
  </div>
</form>
  <div class="container" style="background-color:#f1f1f1">
   <form action="index.php">
       <button type="submit">Grįžti</button>
    </form>
  </div>
    </body>
</html>

