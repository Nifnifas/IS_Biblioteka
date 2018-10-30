<html>
<head>
    <title>Bibliotekos informacinė sistema</title>
</head>

<body>
    <a href="atsijungimas.php">Atsijungti</a><br/>
    <a href="paskyrosRedagavimas.php">Redaguoti paskyrą</a><br/>
    <center>
        <h1>Bibliotekos informacinė sistema</h1>
        <font size="5">RENGINIO PAVADINIMAS, data, laikas</font>
            
            <p></p>
            	Direktoriui:<a href="redaguotiRengini.php">Redaguoti renginio informaciją</a><br/>
            	Direktoriui:<a href="salintiRengini.php">Šalinti renginį</a><br/>
                 
                <p></p>
                Klientui:
        <table border="1" cellpadding="10">
            <tr align="center">
                <td>Bilieto kaina</td>
                <td><a href="pirktiBilieta.php">Pirkti bilietą</a></td>
            </tr>
               <td align="center" colspan="3"><a 		href="atsauktiRezervacija.php">Atšaukti rezervaciją</a></td>
        </table>
        
        <p></p>
        Klientui:
        <table border="1" cellpadding="10">
            <tr align="center">
                <td>Renginio tipas</td>
                <td>Organizatorius</td>
            </tr>
             <td align="center" colspan="2">Aprašymas</td>
        </table>
        
        <p></p>
        Direktoriui:
        <table border="1" cellpadding="10">
            <tr align="center">
                <td>Renginio tipas</td>
                <td>Organizatorius</td>
                <td>Organizatoriaus tel. nr.</td>
                <td>Bilieto kaina</td>
                <td>Vietų skaičius</td>
            </tr>
            <td align="center" colspan="5">Aprašymas</td>
        </table>
        
        <br>
        <div class="container" style="background-color:#f1f1f1">
            <button onclick="javascript:history.back()">Grįžti</button>
        </div>
    </center>
</body>

</html>