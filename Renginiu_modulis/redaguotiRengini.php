<html>
    <head>
        <title>Bibliotekos informacinė sistema</title>
    </head>
    <body>
        <center>
        <h1>Bibliotekos informacinė sistema</h1>
        <font size="4">Renginio redagavimas</font>
        <p></p>
    
    <form action="index.php">
  <div class="container">
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
    <select>
    <option value="type">pasirinkti</option>
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
    <label for="description"><b>Aprašymas</b></label>
    <input type="description"  name="description">
    <br>
    <button type="submit">Keisti</button>
  </div>
   

  <div class="container" style="background-color:#f1f1f1">
    <button onclick="javascript:history.back()">Grįžti į pradžią</button>
  </div>
</form>
</center>
    </body>
</html>