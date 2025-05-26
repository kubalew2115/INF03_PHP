<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyszukiwarka miast</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
</head>
<body>
    <header>
        <img src="baner.jpg" alt="Polska">
    </header>
    <aside>
        <h4>Podaj początek nazwy miasta</h4>
        <form method="POST" action="index.php">
            <input type="text" name="nazwa">
            <button type="submit">Szukaj</button>
        </form>
    </aside>
    <main>
        <h1>Wyniki wyszukiwania miast z uwzględnieniem filtra:</h1>
        <table>
            <tr>
                <th>Miasto</th>
                <th>Województwo</th>
            </tr>
            <?php
                if($_SERVER['REQUEST_METHOD'] === "POST"){
                    $conn = mysqli_connect('localhost','root','','inf_wykaz');

                    $nazwa = $_POST['nazwa'];

                    $query = "SELECT miasta.nazwa, wojewodztwa.nazwa 
                    FROM `miasta` 
                    JOIN wojewodztwa ON wojewodztwa.id = miasta.id_wojewodztwa 
                    WHERE miasta.nazwa LIKE '$nazwa%' 
                    ORDER BY miasta.nazwa";

                    $wynik = mysqli_query($conn,$query);

                    echo"<p id='na'>$nazwa</p>";

                    while($row = mysqli_fetch_row($wynik)){
                        echo"<tr>";
                            echo"<td>$row[0]</td>";
                            echo"<td>$row[1]</td>";
                        echo"</tr>"; 
                    }

                }
            ?>
        </table>
    </main>   
    <footer>
        <p>Egzamin INF.03</p>
        <p>Autor: 0709060534235</p>
    </footer>
</body>
</html>