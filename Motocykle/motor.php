<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <img src="motor.png" alt="motocykl">
    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>
    <main>
        <h2>Gdzie pojechać?</h2>
        <dl>
            <?php
                $conn = mysqli_connect('localhost', 'root','','inf_motory');

                $query = "SELECT wycieczki.nazwa, wycieczki.opis, wycieczki.poczatek, zdjecia.zrodlo 
                FROM `wycieczki` 
                JOIN zdjecia ON zdjecia.id = wycieczki.zdjecia_id";

                $result = mysqli_query($conn,$query);

                while($row = mysqli_fetch_array($result)){
                    echo"<dt>$row[nazwa], rozpoczyna się w $row[poczatek], <a href='$row[zrodlo].jpg'>zobacz zdjęcie</a></dt>";
                    echo"<dd>$row[opis]</dd>";
                }
            ?>
        </dl>
    </main>
    <nav>
        <h2>Co kupić?</h2>
        <ol>
            <li>Honda CBR125R</li>
            <li>Yamaha YBR125</li>
            <li>Honda VFR800i</li>
            <li>Honda CBR1100XX</li>
            <li>BMW R1200GS LC</li>
        </ol>
    </nav>
    <aside>
        <h2>Statystyki</h2>
        <p>Wpisanych wycieczek: 
            <?php 
            $query1 = "SELECT COUNT(*) FROM `wycieczki`";

            $result1 = mysqli_query($conn, $query1);
            
            if($roww = mysqli_fetch_row($result1)){
                echo"$roww[0]";
            }

            mysqli_close($conn);
        ?>
        </p>
        <p>Użytkowników forum: 200</p>
        <p>Przesłanych zdjęć: 1300</p>
    </aside>
    <footer>
        <p>Stronę wykonał: 0706092134</p>
    </footer>
</body>
</html>