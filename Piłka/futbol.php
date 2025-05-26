<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozgrywki futbolowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h2>Światowe rozgrywki piłkarskie</h2>
        <img src="obraz1.jpg" alt="boisko">
    </header>
    <section>
        <?php
            $conn = mysqli_connect('localhost','root','','inf_piłka');

            $query = "SELECT zespol1, zespol2, wynik, data_rozgrywki FROM `rozgrywka` WHERE zespol1 = 'EVG'";

            $wynik = mysqli_query($conn,$query);

            while($row = mysqli_fetch_array($wynik)){
                echo"<div>";
                    echo"<h3>$row[zespol1] - $row[zespol2]</h3>";
                    echo"<h4>$row[wynik]</h4>";
                    echo"<p>w dniu: $row[data_rozgrywki]</p>";
                echo"</div>";
            }
        ?>
    </section>
    <main>
        <h2>Reprezentacja Polski</h2>
    </main>
    <aside>
        <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy)</p>
        <form method="POST" action="futbol.php">
            <input type="number" name="numer">
            <button type="submit">Sprawdź</button>
        </form>
        <ul>
            <?php
                if($_SERVER['REQUEST_METHOD'] === "POST"){
                    $numer = $_POST['numer'];

                    $query1 = "SELECT imie, nazwisko FROM `zawodnik` WHERE pozycja_id = '$numer'";

                    $wynik1 = mysqli_query($conn,$query1);

                    while($roww = mysqli_fetch_array($wynik1)){
                        echo"<li>$roww[imie] $roww[nazwisko]</li>";
                    }
                };
                
                mysqli_close($conn);  
            ?>
        </ul>
    </aside>
    <footer>
        <img src="zad1.png" alt="piłkarz">
        <p>Autor: 0706093485736</p>
    </footer>
</body>
</html>