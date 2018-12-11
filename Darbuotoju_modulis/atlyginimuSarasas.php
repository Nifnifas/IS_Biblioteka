<?php

    $db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$query = "SELECT id, data, tarifas, valandu_sk, psd_mokesciai, ismokamas, apskaiciuotas, premija, fk_darbuotojasid "
            . "FROM " . TBL_ATLYGINIMAS . " WHERE fk_darbuotojasID = $user_id ORDER BY data DESC";
	$result = mysqli_query($db, $query);
        $paskAlgosData = date("2018-01-01");
	if (!$result || (mysqli_num_rows($result) < 1)){  
			{echo "Įrašų nėra!";}
            }else{
                echo "<br><br><table>";
                echo "<tr><td>ID</td><td>Data</td><td>Valandų sk.</td><td>Tarifas</td><td>Mokesčiai, %</td><td>Premija</td><td>Apskaičiuotas</td><td>Išmokėtas</td></tr>";
                $count = 3;
                while($row = $result->fetch_assoc()) {
                    if($count > 0){
                        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["data"]. "</td><td>" . $row["valandu_sk"]. "</td><td>" . $row["tarifas"] . "</td><td>" . $row["psd_mokesciai"] . "</td><td>"
                            . $row["premija"] . "</td><td>" . $row["apskaiciuotas"] . "</td><td>" . $row["ismokamas"] . "</td></tr>";
                        if($row["data"] > $paskAlgosData){
                            $paskAlgosData = $row["data"];
                        }
                    $count--;
                    }
                    else{
                        break;
                    }
                }
                echo "</table>";
            }
            
        mysqli_close($db);
?>