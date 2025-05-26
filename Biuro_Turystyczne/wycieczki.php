<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki po Europie</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header>
        <h1>BIURO TURYSTYCZNE</h1>
    </header>
    <nav>
        <h3>Wycieczki, na które są wolne miejsca</h3>
        <ul>
            <?php
                $conn = mysqli_connect('localhost','root','','egz_biuro');

                $query = "SELECT `id`, `dataWyjazdu`, `cel`, `cena` FROM `wycieczki` WHERE dostepna = '1'";

                $wynik = mysqli_query($conn,$query);

                while($row = mysqli_fetch_array($wynik)){
                    echo"<li>$row[id]. dnia $row[dataWyjazdu] jedziemy do $row[cel], cena $row[cena]</li>";
                } 
            ?>
        </ul>
    </nav>
    <section>
        <h2>Bestselery</h2>
        <table>
            <tr>
                <td>Wenecja</td>
                <td>kwiecień</td>
            </tr>
            <tr>
                <td>Londyn</td>
                <td>lipiec</td>
            </tr>
            <tr>
                <td>Rzym</td>
                <td>wrzesień</td>
            </tr>
        </table>
    </section>
    <main>
        <h2>Nasze zdjęcia</h2>
        <?php
            $query1 = "SELECT `nazwaPliku`, `podpis` FROM `zdjecia` ORDER BY podpis DESC";

            $wynik1 = mysqli_query($conn, $query1);

            while($roww = mysqli_fetch_array($wynik1)){
                echo"<img src='$roww[nazwaPliku]' alt='$roww[podpis]'>";
            }

            mysqli_close($conn);
        ?>
    </main>
    <aside>
        <h2>Skontaktuj się</h2>
        <a href="mailto:turysta@wycieczki.pl">napisz do nas</a>
        <p>telefon: 111222333</p>
    </aside>
    <footer>
        <p>Stronę wykonał: 07090653245</p>
    </footer>
</body>
</html>