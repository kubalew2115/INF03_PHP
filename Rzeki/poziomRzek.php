<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poziomy rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <img src="obraz1.png" alt="Mapa Polski">
    </header>
    <header>
        <h1>Rzeki w województwie dolnośląskim</h1>
    </header>
    <section>
        <form method="POST" action="poziomRzek.php">
            <input type="radio" name="stan" value="wszystkie">
            <label class="opcja">Wszystkie</label>
            <input type="radio" name="stan" value="ostrzegawczy">
            <label class="opcja">Ponad stan ostrzegawczy</label>
            <input type="radio" name="stan" value="alarmowy">
            <label class="opcja">Ponad stan alarmowy</label>
            <button type="submit">Pokaż</button>
        </form>
    </section>
    <main>
        <h3>Stany na dzień 2022-05-05</h3>
        <table>
            <tr>
                <th>Wodomierz</th>
                <th>Rzeka</th>
                <th>Ostrzegawczy</th>
                <th>Alarmowy</th>
                <th>Aktulany</th>
            </tr>
            <?php
                $conn = mysqli_connect('localhost','root','','inf_rzeki');

                if($_SERVER['REQUEST_METHOD'] === "POST"){
                    $wybrane = $_POST['stan'];

                    if($wybrane == "wszystkie"){
                        $query = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody 
                        FROM `wodowskazy` 
                        JOIN pomiary ON pomiary.wodowskazy_id = wodowskazy.id 
                        WHERE pomiary.dataPomiaru = '2022-05-05'";

                        $result = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result)){
                            echo"<tr>";
                                echo"<td>$row[nazwa]</td>";
                                echo"<td>$row[rzeka]</td>";
                                echo"<td>$row[stanOstrzegawczy]</td>";
                                echo"<td>$row[stanAlarmowy]</td>";
                                echo"<td>$row[stanWody]</td>";
                            echo"</tr>";
                        }
                    }else if($wybrane == "ostrzegawczy"){
                        $query1 = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody 
                        FROM `wodowskazy` 
                        JOIN pomiary ON pomiary.wodowskazy_id = wodowskazy.id 
                        WHERE pomiary.dataPomiaru = '2022-05-05' 
                        AND pomiary.stanWody > wodowskazy.stanOstrzegawczy";

                        $result1 = mysqli_query($conn, $query1);

                        while($roww = mysqli_fetch_array($result1)){
                            echo"<tr>";
                                echo"<td>$roww[nazwa]</td>";
                                echo"<td>$roww[rzeka]</td>";
                                echo"<td>$roww[stanOstrzegawczy]</td>";
                                echo"<td>$roww[stanAlarmowy]</td>";
                                echo"<td>$roww[stanWody]</td>";
                            echo"</tr>";
                        }
                    }else if($wybrane == "alarmowy"){
                        $query2 = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody 
                        FROM `wodowskazy` 
                        JOIN pomiary ON pomiary.wodowskazy_id = wodowskazy.id 
                        WHERE pomiary.dataPomiaru = '2022-05-05' 
                        AND pomiary.stanWody > wodowskazy.stanAlarmowy";

                        $result2 = mysqli_query($conn, $query2);

                        while($rowww = mysqli_fetch_array($result2)){
                            echo"<tr>";
                                echo"<td>$rowww[nazwa]</td>";
                                echo"<td>$rowww[rzeka]</td>";
                                echo"<td>$rowww[stanOstrzegawczy]</td>";
                                echo"<td>$rowww[stanAlarmowy]</td>";
                                echo"<td>$rowww[stanWody]</td>";
                            echo"</tr>";
                        }
                    }
                }
            ?>
        </table>
    </main>
    <aside>
        <h3>Informacje</h3>
        <ul>
            <li>Brak ostrzeżeń o burzach z gradem</li>
            <li>Smog w mieście Wrocław</li>
            <li>Sliny wiatr w Karkonoszach</li>
        </ul>
        <h3>Średnie stany wód</h3>
        <?php
            $query3 = "SELECT dataPomiaru, AVG(stanWody) FROM `pomiary` GROUP BY dataPomiaru";

            $result3 = mysqli_query($conn, $query3);

            while($rowwww = mysqli_fetch_row($result3)){
                echo"<p>$rowwww[0]: $rowwww[1]</p>";
            }
        
        ?>
        <a href="https://komunikaty.pl">Dowiedz się więcej</a>
        <img src="obraz2.jpg" alt="rzeka">
    </aside>
    <footer>
        <p>Stronę wykonał: 0706093481</p>
    </footer>
</body>
</html>