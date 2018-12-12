<html>
    <head>
        <title>Bibliotekos informacinė sistema</title>
    </head>
    <body>
        <center>
        <h1>Bibliotekos informacinė sistema</h1>
        </center>
    
    <form action="Procesai/prisijungti.php" method="POST">
  <div class="container">
    <label for="username"><b>Prisijungimo vardas</b></label>
    <input type="text" name="username">
    <br>
    <label for="password"><b>Slaptažodis</b></label>
    <input type="password"  name="password">

    <button type="submit" name="login-submit">Prisijungti</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Prisiminti mane
    </label>
  </div>
  </form>

  <div class="container" style="background-color:#f1f1f1">
    <form action="index.php">
       <button type="submit">Grįžti</button>
    </form>
  </div>

    </body>
</html>

