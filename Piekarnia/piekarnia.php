<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIEKARNIA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <img src="wypieki.PNG" alt="Produkty naszej piekarni">
    <nav>
        <a href="kw.txt">KWERENDA 1</a>
        <a href="kw.txt">KWERENDA 2</a>
        <a href="kw.txt">KWERENDA 3</a>
        <a href="kw.txt">KWERENDA 4</a>
    </nav>
    <header>
        <h1>WITAMY</h1>
        <h4>NA STRONIE PIEKARNI</h4>
        <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>
    </header>
    <main>
        <h4>Wybierz rodzaj wypieków:</h4>
        <form method="POST" action="piekarnia.php">
            <select name="lista">
                <?php
                $conn = mysqli_connect('localhost','root','','inf_pierkarnia');

                $query = "SELECT Rodzaj FROM `wyroby` GROUP BY Rodzaj DESC ORDER BY `wyroby`.`Rodzaj` DESC";

                $result = mysqli_query($conn,$query);

                while($row = mysqli_fetch_array($result)){
                    echo"<option value='$row[Rodzaj]'>$row[Rodzaj]</option>";
                }
                ?>
            </select>
            <button type="submit">Wybierz</button>
        </form>
        <table>
            <tr>
                <th>Rodzaj</th>
                <th>Nazwa</th>
                <th>Gramatura</th>
                <th>Cena</th>
            </tr>
            <?php
                if($_SERVER['REQUEST_METHOD'] === "POST"){
                    $rodzaj = $_POST['lista'];

                    $query1 = "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM `wyroby` WHERE Rodzaj = '$rodzaj'";

                    $result1 = mysqli_query($conn, $query1);

                    while($roww = mysqli_fetch_array($result1)){
                        echo"<tr>";
                            echo"<td>$roww[Rodzaj]</td>";
                            echo"<td>$roww[Nazwa]</td>";
                            echo"<td>$roww[Gramatura]</td>";
                            echo"<td>$roww[Cena]</td>";
                        echo"</tr>";
                    }
                }
            ?>
        </table>
    </main>
    <footer>
        <p>AUTOR 070609834531</p>
        <p>Data: 10.06.2025</p>
    </footer>
</body>
</html>