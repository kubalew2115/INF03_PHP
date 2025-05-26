<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>
    <section>
        <a href="peruwianka.php">Rasa Peruwianka</a>
        <a href="american.php">Rasa American</a>
        <a href="crested.php">Rasa Crested</a>
    </section>
    <nav>
        <h3>Poznaj wszystkie rasy świnek morskich</h3>
        <ol>
            <?php
                $conn = mysqli_connect('localhost','root','','inf_hodowla');

                $query = "SELECT rasa FROM `rasy`";

                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($result)){
                    echo"<li>$row[rasa]</li>";
                }
            ?>
        </ol>
    </nav>    
    <main>
        <img src="peruwianka.jpg" alt="Świnka morska rasy peruwianka">
        <?php
            $query1 = "SELECT swinki.data_ur, swinki.miot, rasy.rasa FROM `swinki` JOIN rasy ON rasy.id = swinki.rasy_id WHERE rasy.id = 1 GROUP BY swinki.data_ur";

            $result1 = mysqli_query($conn,$query1);

            if($roww = mysqli_fetch_array($result1)){
                echo"<h2>Rasa: $roww[rasa]</h2>";
                echo"<p>Data urodzenia: $roww[data_ur]</p>";
                echo"<p>Oznaczenie miotu: $roww[miot]</p>";
            }
        ?>
        <hr>
        <h2>Świnki w tym miocie</h2>
        <?php
            $query2 = "SELECT imie, cena, opis FROM `swinki` WHERE rasy_id = 1";

            $result2 = mysqli_query($conn,$query2);

            while($rowww = mysqli_fetch_array($result2)){
                echo"<h3>$rowww[imie] - $rowww[cena]</h3>";
                echo"<p>$rowww[opis]</p>";
            }
        ?>
    </main>    
    <footer>
        <p>Stronę wykonał: 07060934123</p>
    </footer>
</body>
</html>