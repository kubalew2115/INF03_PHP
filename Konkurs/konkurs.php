<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WOLONTARIAT SZKOLNY</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
    </header>
    <main>
        <h3>Konkursowe nagrody</h3>
        <button onclick="window.location.reload()">Losuj nowe nagrody</button>
        <table>
            <tr>
                <th>Nr</th>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Wartość</th>
            </tr>
            <?php
                $conn = mysqli_connect('localhost', 'root', '','inf_konkurs');

                $query = "SELECT nazwa, opis, cena FROM `nagrody` ORDER BY rand() LIMIT 5";

                $result = mysqli_query($conn, $query);

                $i = 1;

                while($row = mysqli_fetch_array($result)){
                    echo"<tr>";
                        echo"<td>$i</td>";
                        echo"<td>$row[nazwa]</td>";
                        echo"<td>$row[opis]</td>";
                        echo"<td>$row[cena]</td>";
                    echo"</tr>";
                    $i++;
                }
            ?>
        </table>
    </main>
    <nav>
        <img src="puchar.png" alt="Puchar dla wolonatriusza">
        <h4>Polecane linki</h4>
        <ul>
            <li><a href="kw.txt">Kwerenda1</a></li>
            <li><a href="kw.txt">Kwerenda2</a></li>
            <li><a href="kw.txt">Kwerenda3</a></li>
            <li><a href="kw.txt">Kwerenda4</a></li>
        </ul>
    </nav>
    <footer>
        <p>Numer zdającego: 07090623412</p>
    </footer>
</body>
</html>