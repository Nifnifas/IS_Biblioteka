<html>
    <head>
        <title>Bibliotekos informacinė sistema</title>
    </head>
    <body>
        <center>
        <h1>Bibliotekos informacinė sistema</h1>
        </center>
    
    <form action="index.php">
  <div class="container">
    <label for="uname"><b>El. paštas</b></label>
    <input type="text" name="uname">
    <br>
    <label for="psw"><b>Slaptažodis</b></label>
    <input type="password"  name="psw">

    <button type="submit">Prisijungti</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Prisiminti mane
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button onclick="location.href='main.php'" type="button">Grįžti</button>
  </div>
</form>
    </body>
</html>

