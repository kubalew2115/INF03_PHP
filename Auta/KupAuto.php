<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1><i>KupAuto!</i> Internetowy Komis Samochodowy</h1>
    </header>
    <aside>
    <?php
        $conn = mysqli_connect('localhost','root','','inf_kupauto');

        $query = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM `samochody` WHERE id = 10";

        $result = mysqli_query($conn,$query);

        if($row = mysqli_fetch_array($result)){
            echo"<img src='$row[zdjecie]' alt='oferta dnia'>";
            echo"<h4>Oferta dnia: $row[model]</h4>";
            echo"<p>Rocznik: $row[rocznik], przebieg: $row[przebieg], rodzaj paliwa: $row[paliwo]</p>";
            echo"<h4>Cena: $row[cena]</h4>";
        }
    ?>
    </aside>
    <main>  
        <h2>Ofery Wyróżnione</h2>
        <?php
        $query1 = "SELECT marki.nazwa, samochody.model, samochody.rocznik, samochody.cena, samochody.zdjecie 
        FROM `marki` 
        JOIN samochody ON samochody.marki_id = marki.id 
        WHERE samochody.wyrozniony = 1 
        LIMIT 4";

        $result1 = mysqli_query($conn,$query1);

        while($roww = mysqli_fetch_array($result1)){
            echo"<div>";
            echo"<img src='$roww[zdjecie]' alt='model'>";
            echo"<h4>$roww[nazwa] $roww[model]</h4>";
            echo"<p>Rocznik: $roww[rocznik]</p>";
            echo"<h4>Cena: $roww[cena]</h4>";
            echo"</div>";
        }
        ?>
    </main>
    <section>
        <h2>Wybierz markę</h2>
        <form method="POST" action="KupAuto.php">
            <select name="lista">
                <?php
                    $query2 = "SELECT nazwa FROM `marki` WHERE 1";

                    $result2 = mysqli_query($conn, $query2);

                    while($rowww = mysqli_fetch_array($result2)){
                        echo"<option value='$rowww[nazwa]'>$rowww[nazwa]</option>";
                    }
                ?>
            </select>
            <button type="submit">Wyszukaj</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] === "POST"){
                $marka = $_POST['lista'];

                $query3 = "SELECT model, cena, zdjecie FROM `samochody` 
                JOIN marki ON marki.id = samochody.marki_id 
                WHERE marki.nazwa = '$marka'";

                $result3 = mysqli_query($conn,$query3);

                while($rowwww = mysqli_fetch_array($result3)){
                    echo"<div>";
                    echo"<img src='$rowwww[zdjecie]' alt='model'>";
                    echo"<h4>$rowwww[model]</h4>";
                    echo"<h4>Cena: $rowwww[cena]</h4>";
                    echo"</div>";
                }
            }
        ?>
    </section>
    <footer>
        <p>Stronę wykonał: 0706091423
            <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>
        </p>
    </footer>
</body>
</html>