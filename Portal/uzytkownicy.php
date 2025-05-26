<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <h2>Nasze osiedle</h2>
    </header>
    <nav>
        <?php
            $conn = mysqli_connect('localhost', 'root','','inf_portal');

            $query = "SELECT COUNT(id) FROM `dane`";

            $result = mysqli_query($conn,$query);

            if($row = mysqli_fetch_row($result)){
                echo"<h5>Liczba użytkowników portalu: $row[0]</h5>";
            }
        ?>
    </nav>
    <aside>
        <h3>Logowanie</h3>
        <form method="POST" action="uzytkownicy.php">
            <label>login</label><br>
            <input type="text" name="login"><br>
            <label>hasło</label><br>
            <input type="password" name="haslo"><br>
            <button type="submit">Zaloguj</button>
        </form>
    </aside>
    <main>
        <h3>Wizytówka</h3>
        <div>
            <?php
                if($_SERVER['REQUEST_METHOD'] === "POST"){
                    $login = $_POST['login'];
                    $haslo = $_POST['haslo'];

                    if($login != "" && $haslo !=""){
                        $query1 = "SELECT haslo FROM `uzytkownicy` WHERE login = '$login'";

                        $result1 = mysqli_query($conn, $query1);

                        while($roww = mysqli_fetch_array($result1)){
                            $hasloBaza = "$roww[haslo]";

                            if($hasloBaza != ""){
                                $hasloSzyfr = sha1($haslo);

                                if($hasloSzyfr == $hasloBaza){
                                    $query2 = "SELECT uzytkownicy.login, dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie 
                                    FROM `uzytkownicy` 
                                    JOIN dane ON dane.id = uzytkownicy.id 
                                    WHERE uzytkownicy.login = '$login'";

                                    $result2 = mysqli_query($conn,$query2);

                                    if($rowww = mysqli_fetch_array($result2)){
                                        $data = date("Y");

                                        $dataUr = "$rowww[rok_urodz]" ;

                                        $wiek = $data - $dataUr;

                                        echo"<img src='$rowww[zdjecie]' alt='osoba'>";
                                        echo"<h4>$rowww[login] ($wiek)</h4>";
                                        echo"<p>hobby: $rowww[hobby]</p>";
                                        echo"<h5><img src='icon-on.png'> $rowww[przyjaciol]</h5>";
                                        echo"<a href='dane.html'><button>Więcej informacji</button></a>";
                                    }
                                }else{
                                    echo"hasło nieprawidłowe";
                                }
                            }else{
                                echo"login nieprawidłowy";
                            }
                        }
                    }
                }
            ?>
        </div>
    </main>
    <footer>
        <p>Stronę wykonał: 0706093461</p>
    </footer>
</body>
</html>