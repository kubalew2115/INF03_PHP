<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZDOBYWCY GÓR</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Klub zdobywców gór polskich</h1>
    </header>
    <nav>
        <a href="kw.txt">kwerenda1</a>
        <a href="kw.txt">kwerenda2</a>
        <a href="kw.txt">kwerenda3</a>
        <a href="kw.txt">kwerenda4</a>
    </nav>
    <aside>
        <img src="logo.png" alt="logo zdobywcy">
        <h3>razem z nami:</h3>
        <ul>
            <li>wyjazdy</li>
            <li>szkolenia</li>
            <li>rekreacja</li>
            <li>wypoczynek</li>
            <li>wyzwania</li>
        </ul>
    </aside>
    <main>
        <h2>Dołącz do naszego zespołu!</h2>
        <p>Wpisz swoje dane do formularza:</p>
        <form method="POST" action="zdobywcy.php">
            <label>Nazwisko: <input type="text" name="nazwisko"></label>
            <label>Imię: <input type="text" name="imie"></label>
            <label>Funkcja
                <select name="funkcja">
                    <option value="uczestnik">uczestnik</option>
                    <option value="przewodnik">przewodnik</option>
                    <option value="zaopatrzeniowiec">zaopatrzeniowiec</option>
                    <option value="organizator">organizator</option>
                    <option value="ratownik">ratownik</option>
                </select>
            </label>
            <label>Email: <input type="email" name="email"></label>
            <button type="submit">Dodaj</button>
        </form>
        <table>
            <tr>
                <th>Nazwisko</th>
                <th>Imię</th>
                <th>Funkcja</th>
                <th>Email</th>
            </tr>
            <?php
                $conn = mysqli_connect('localhost','root','','inf_zdobywcy');

                $query = "SELECT nazwisko, imie, funkcja, email FROM `osoby`";

                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($result)){
                    echo"<tr>";
                        echo"<td>$row[nazwisko]</td>";
                        echo"<td>$row[imie]</td>";
                        echo"<td>$row[funkcja]</td>";
                        echo"<td>$row[email]</td>";
                    echo"</tr>";
                }
            ?>
            <?php
                if($_SERVER['REQUEST_METHOD'] === "POST"){
                    $nazwisko = $_POST['nazwisko'];
                    $imie = $_POST['imie'];
                    $funkcja = $_POST['funkcja'];
                    $email = $_POST['email'];

                    if($nazwisko != "" && $imie != "" && $funkcja != "" && $email != ""){
                        $query1 = "INSERT INTO `osoby` ( `nazwisko`, `imie`, `funkcja`, `email`) VALUES ( '$nazwisko', '$imie', '$funkcja', '$email')";

                        $result1 = mysqli_query($conn,$query1);
                    }

                    echo"<script>window.location.href = window.location.href</script>";
                }

                mysqli_close($conn);
            ?>
        </table>
    </main>
    <footer>
        <p>Stronę wykonał: 07060981443</p>
    </footer>
</body>
</html>