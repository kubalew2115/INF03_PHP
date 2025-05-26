<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header>
        <h1>Internetowa wypożyczalnia filmów</h1>
    </header>
    <nav>
        <table>
            <tr>
                <td>Kryminał</td>
                <td>Horror</td>
                <td>Przygodowy</td>
            </tr>
                <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
            </tr>
        </table>
    </nav>
    <section>
        <h3>Polecamy</h3>
        <?php
            $conn = mysqli_connect('localhost', 'root','','inf_dane3');

            $query = "SELECT id, nazwa, opis, zdjecie FROM `produkty` WHERE id = '18' OR id = '22' OR id = '23' OR id = '25'";

            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_array($result)){
                echo"<div>";
                    echo"<h4>$row[id]. $row[nazwa]</h4>";
                    echo"<img src='$row[zdjecie]' alt='film'>";
                    echo"<p>$row[opis]</p>";
                echo"</div>";
            };
        ?>
    </section>
    <section>
        <h3>Filmy fantastyczne</h3>
        <?php
            $query1 = "SELECT id, nazwa, opis, zdjecie FROM `produkty` WHERE Rodzaje_id = '12'";

            $result1 = mysqli_query($conn, $query1);

            while($roww = mysqli_fetch_array($result1)){
                echo"<div>";
                    echo"<h4>$roww[id]. $roww[nazwa]</h4>";
                    echo"<img src='$roww[zdjecie]' alt='film'>";
                    echo"<p>$roww[opis]</p>";
                echo"</div>";
            };
        ?>
    </section>
    <footer>
        <form method="POST" action="video.php">
            <label>Usuń film nr.: </label><input type="number" name="numer">
            <button type="submit">Usuń fiml</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $numer = $_POST['numer'];

                $query2 = "DELETE FROM produkty WHERE produkty.id = $numer";

                $result2 = mysqli_query($conn, $query2);
            }
            mysqli_close($conn);
        ?>
        <span>Stronę wykonał: 07060921341</span>
    </footer>
</body>
</html>