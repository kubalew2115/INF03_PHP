<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Ważenie pojazdów we Wrocławiu</h1>
    </header>
    <aside>
        <img src="obraz1.png" alt="waga">
    </aside>
    <nav>
        <h2>Lokalizacje wag</h2>
        <ol>
            <?php
                $conn = mysqli_connect('localhost','root','','inf_wazenietirow');


                $query = "SELECT ulica FROM `lokalizacje`";

                $wynik = mysqli_query($conn,$query);

                while($row = mysqli_fetch_array($wynik)){
                    echo"<li>ulica $row[ulica]</li>";
                }
            ?>
        </ol>
        <h1>Kontakt</h1>
        <a href="mailto:wazenie@wroclaw.pl">napisz</a>
    </nav>
    <main>
        <h2>Alerty</h2>
        <table>
            <tr>
                <th>rejestracja</th>
                <th>ulica</th>
                <th>waga</th>
                <th>dzień</th>
                <th>czas</th>
            </tr>
            <?php
                $query1 = "SELECT wagi.lokalizacje_id, wagi.waga, wagi.rejestracja, wagi.dzien, wagi.czas, lokalizacje.ulica 
                FROM `wagi` 
                JOIN lokalizacje ON lokalizacje.id = wagi.lokalizacje_id 
                WHERE waga > 5";

                $wynik1 = mysqli_query($conn, $query1);

                while($roww = mysqli_fetch_array($wynik1)){
                    echo"<tr>";
                        echo"<td>$roww[rejestracja]</td>";
                        echo"<td>$roww[ulica]</td>";
                        echo"<td>$roww[waga]</td>";
                        echo"<td>$roww[dzien]</td>";
                        echo"<td>$roww[czas]</td>";
                    echo"</tr>";
                }
            ?>
            <?php
                $query2 = "INSERT INTO `wagi` ( `lokalizacje_id`, `waga`, `rejestracja`, `dzien`, `czas`) VALUES ('5', floor(rand()*10), 'DW12345', CURRENT_DATE, CURRENT_TIME)";

                $wynik2 = mysqli_query($conn,$query2);
                
                header("Refresh: 1000");
            ?>
        </table>
    </main>
    <section>
        <img src="obraz2.jpg" alt="tir" id="tir">
    </section>
    <footer>
        <p>Stronę wykonał: 07060943683423</p>
    </footer>
</body>
</html>