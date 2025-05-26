<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <header>
        <h1>Internetowy sklep z eko-warzywami</h1>
    </header>
    <nav>
        <ol>
            <li>warzywa</li>
            <li>owoce</li>
            <li><a href="https://terapiasokami.pl/" target="_blank">soki</a></li>
        </ol>
    </nav>
    <main>
        <?php
            $conn = mysqli_connect('localhost','root','','inf_dane2');

            $query = "SELECT nazwa, ilosc, opis, cena, zdjecie 
            FROM `produkty` 
            WHERE Rodzaje_id = 1 OR Rodzaje_id = 2";

            $result = mysqli_query($conn,$query);

            while($row = mysqli_fetch_array($result)){
                echo"<div>";
                    echo"<img src='$row[zdjecie]' alt='warzywniak'>";
                    echo"<h5>$row[nazwa]</h5>";
                    echo"<p>opis: $row[opis]</p>";
                    echo"<p>na stanie: $row[ilosc]</p>";
                    echo"<h2>$row[cena] zł</h2>";
                echo"</div>";
            }
        ?>
    </main>
    <footer>
        <form method="POST" action="sklep.php">
            <label>Nazwa:</label><input type="text" name="nazwa">
            <label>Cena:</label><input type="number" name="cena">
            <button type="submit">Dodaj produkt</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] === "POST"){
                $nazwa = $_POST['nazwa'];
                $cena = $_POST['cena'];

                $query1 = "INSERT INTO `produkty` ( `Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie`) VALUES ('1', '4', '$nazwa', '10', NULL, '$cena', 'owoce.jpg')";

                $result1 = mysqli_query($conn, $query1);

                echo"<script>window.location.href = window.location.href</script>";
            }
            mysqli_close($conn);
        ?>
        <p>Stronę wykonał: 07060981324</p>
    </footer>
</body>
</html>