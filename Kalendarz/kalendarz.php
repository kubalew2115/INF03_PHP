<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Dni, miesiące, lata...</h1>
    </header>
    <section>
        <?php
            $conn = mysqli_connect('localhost','root','','inf_kalendarz');

            $dataImienin = date("m-d");

            $tablica = [
                "Poniedziałek",
                "Wtorek",
                "Środa",
                "Czwartek",
                "Piątek",
                "Sobota",
                "Niedziela"
            ];

            $dzienTyg = $tablica[date("N") - 1];

            $dataCala = date("d-m-Y");

            $query = "SELECT imieniny.imiona FROM `imieniny` WHERE imieniny.data = '$dataImienin'";

            $result = mysqli_query($conn,$query);

            while($row = mysqli_fetch_array($result)){
                echo"<p>Dzisaj jest $dzienTyg, $dataCala, imieniny: $row[imiona]</p>";
            }
        ?>
    </section>
    <nav>
        <table>
            <tr>
                <th>liczba dni</th>
                <th>miesiąc</th>
            </tr>
            <tr>
                <td rowspan="7">31</td>
                <td>styczeń</td>
            </tr>
            <tr>
                <td>marzec</td>
            </tr>
            <tr>
                <td>maj</td>
            </tr>
            <tr>
                <td>lipiec</td>
            </tr>
            <tr>
                <td>sierpień</td>
            </tr>
            <tr>
                <td>październik</td>
            </tr>
            <tr>
                <td>grudzień</td>
            </tr>
            <tr>
                <td rowspan="4">30</td>
                <td>kwiecień</td>
            </tr>
            <tr>
                <td>czerwiec</td>
            </tr>
            <tr>
                <td>wrzesień</td>
            </tr>
            <tr>
                <td>listopad</td>
            </tr>
            <tr>
                <td>28 lub 29</td>
                <td>luty</td>
            </tr>
        </table>
    </nav>
    <main>
        <h2>Sprawdź kro ma urodziny</h2>
        <form method="POST" action="kalendarz.php">
            <input type="date" min="2024-01-01" max="2024-12-31" name="data" value="2024-01-01">
            <button type="submit">wyślij</button>
        </form>   
        <?php
            if($_SERVER['REQUEST_METHOD'] === "POST"){
                $dataForm = $_POST['data'];

                $format = date('m-d', strtotime($dataForm));

                $dataAkt = date('Y-m-d', strtotime($dataForm));;

                $query1 = "SELECT imieniny.imiona FROM `imieniny` WHERE imieniny.data = '$format'";

                $result1 = mysqli_query($conn,$query1);

                while($roww = mysqli_fetch_array($result1)){
                    echo"Dnia $dataAkt są imieniny: $roww[imiona]";
                }
            }

            mysqli_close($conn);
        ?>
    </main>
    <aside>
        <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów" target="_blank"><img src="kalendarz.gif" alt="Kalendarz majów"></a>
        <h2>Rodzaje kalendarzy</h2>
        <ol>
            <li>słoneczny
                <ul>
                    <li>kalendarz Majów</li>
                    <li>juliański</li>
                    <li>gregoriański</li>
                </ul>
            </li>
            <li>księżycowy
                <ul>
                    <li>starogrecki</li>
                    <li>babiloński</li>
                </ul>
            </li>
        </ol>
    </aside>
    <footer>
        <p>Stronę opracował: 070609523421</p>
    </footer>
</body>
</html>