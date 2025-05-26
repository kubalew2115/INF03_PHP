<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Mieszlania farb</title>
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="baner.png" alt="Mieszalnia farb">
    </header>
    <form method="POST" action="index.php">
        <label>Data odbioru od: <input type="date" name="od"></label>
        <label>do: <input type="date" name="do"></label>
        <button type="submit">Wyszukaj</button>
    </form>
    <main>
        <table>
            <tr>
                <th>Nr zamówienia</th>
                <th>Nazwisko</th>
                <th>Imie</th>
                <th>Kolor</th>
                <th>Pojemność [ml]</th>
                <th>Data odbioru</th>
            </tr>
            <?php
                $conn = mysqli_connect('localhost','root','','inf_mieszalnia');
                    if(!$_POST){
                        $query = "SELECT klienci.Imie, klienci.Nazwisko, klienci.Id, zamowienia.kod_koloru, zamowienia.pojemnosc, zamowienia.data_odbioru 
                        FROM `klienci` 
                        JOIN zamowienia ON zamowienia.id_klienta = klienci.Id 
                        ORDER BY zamowienia.data_odbioru ASC";

                        $wynik = mysqli_query($conn,$query);
                        
                        while($row = mysqli_fetch_array($wynik)){
                            echo"<tr>";
                                echo"<td>$row[Id]</td>";
                                echo"<td>$row[Nazwisko]</td>";
                                echo"<td>$row[Imie]</td>";
                                echo"<td style='background-color:#$row[kod_koloru] ;'>$row[kod_koloru]</td>";
                                echo"<td>$row[pojemnosc]</td>";
                                echo"<td>$row[data_odbioru]</td>";
                            echo"</tr>";
                        }
                    }else{
                        if($_SERVER['REQUEST_METHOD'] === "POST"){
                            $od = $_POST['od'] ;
                            $do = $_POST['do'];

                            $query1 = "SELECT klienci.Nazwisko, klienci.Imie, klienci.Id, zamowienia.kod_koloru, zamowienia.pojemnosc, zamowienia.data_odbioru 
                            FROM `klienci` 
                            JOIN zamowienia ON zamowienia.id_klienta = klienci.Id
                            WHERE zamowienia.data_odbioru BETWEEN '$od' AND '$do'
                            ORDER BY zamowienia.data_odbioru ASC";

                            $wynik1 = mysqli_query($conn,$query1);
                            
                            while($roww = mysqli_fetch_array($wynik1)){
                                echo"<tr>";
                                    echo"<td>$roww[Id]</td>";
                                    echo"<td>$roww[Nazwisko]</td>";
                                    echo"<td>$roww[Imie]</td>";
                                    echo"<td style='background-color:#$roww[kod_koloru] ;'>$roww[kod_koloru]</td>";
                                    echo"<td>$roww[pojemnosc]</td>";
                                    echo"<td>$roww[data_odbioru]</td>";
                                echo"</tr>";
                            }
                        }
                    }
                mysqli_close($conn);
            ?>
        </table>
    </main>
    <footer>
        <h3>Egzamin INF.03</h3>
        <p>Autor: 07090632461664</p>
    </footer>
</body>
</html>