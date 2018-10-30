<html>
    <head>
        <title>Bibliotekos informacinė sistema</title>
    </head>
    <body>
        <a href="atsijungimas.php">Atsijungti</a><br/>
        <a href="/is_biblioteka/turimiTaskai.php">Turimi taškai</a><br/>
        <center>
        <h1>Bibliotekos informacinė sistema</h1>
        </center>
    
    <form action="index.php">
  <div class="container">
    <label for="name"><b>Vardas</b></label>
    <input type="name"  name="name">
    <br>
    <label for="surname"><b>Pavardė</b></label>
    <input type="surname"  name="surname">
    <br>
    <label for="email"><b>El. paštas</b></label>
    <input type="email" name="email">
    <br>
    <label for="psw"><b>Slaptažodis</b></label>
    <input type="password"  name="psw">
    <br>
    <label for="psw"><b>Pakartoti slaptažodį</b></label>
    <input type="password"  name="psw">
    <br>
    <button type="submit">Keisti duomenis</button>
    <br>
    <td><a href="istrintiPaskyra.php">Ištrinti paskyrą?</a></td>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button onclick="location.href='index.php'" type="button">Grįžti</button>
  </div>
</form>
    </body>
</html>

