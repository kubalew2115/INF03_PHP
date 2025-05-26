<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port Lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <aside>
        <img src="zad5.png" alt="logo lotnisko">
    </aside>
    <header>
        <h1>Przyloty</h1>
    </header>
    <nav>
        <h3>przydatne linki</h3>
        <a href="kw.txt">Pobierz...</a>
    </nav>
    <main>
        <table>
            <tr>
                <th>czas</th>
                <th>kierunek</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>
            <?php
                $conn = mysqli_connect('localhost','root','','inf_przyloty');

                $query = "SELECT czas, kierunek,nr_rejsu,status_lotu FROM `przyloty` ORDER BY czas ASC";

                $result = mysqli_query($conn,$query);

                while($row = mysqli_fetch_array($result)){
                    echo"<tr>";
                        echo"<td>$row[czas]</td>";
                        echo"<td>$row[kierunek]</td>";
                        echo"<td>$row[nr_rejsu]</td>";
                        echo"<td>$row[status_lotu]</td>";
                    echo"</tr>";
                }

                mysqli_close($conn);
            ?>
        </table>
    </main>
    <section>
        <?php
            if(isset($_COOKIE['odwiedzin'])){
                $liczba = $_COOKIE['odwiedzin'] + 1;
            }else{
                $liczba = 1;
            }

            setcookie('odwiedzin',$liczba,time() + 7200);

            if($liczba == 1){
                echo"<p>Dzień dobry! Strona lotniska używa ciasteczek</p>";
            }else{
                echo"<p><i>Witaj ponownie na stronie lotniska</i></p>";
            }
        
        ?>
    </section>
    <footer>
        Autor: 0706092341
    </footer>
</body>
</html>