<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sierpniowy Kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <h1>Organizer: SIERPIEŃ</h1>
    </header>
    <nav>
        <form method="POST" action="organizer.php">
            <label>Zapisz wydarzenie: <input type="text" name="text"></label>
            <button type="submit">OK</button>
        </form>
    </nav>
    <aside>
        <img src="logo2.png" alt="sierpień">
    </aside>
    <main>
        <?php
            $conn = mysqli_connect('localhost','root','','egz_kalendarze');
        
            if($_SERVER['REQUEST_METHOD'] === "POST"){
                $text = $_POST['text'];
                
                $query = "UPDATE `zadania` SET `wpis` = '$text' WHERE dataZadania = '2020-08-09'";

                $wynik = mysqli_query($conn,$query);

                if($wynik == true){
                    echo"<script>window.location.href = window.location.href</script>";
                }
            }

            $query1 = "SELECT dataZadania, wpis FROM `zadania` WHERE miesiac = 'sierpien'";

            $wynik1 = mysqli_query($conn,$query1);

            while($row = mysqli_fetch_array($wynik1)){
                echo"<div>";
                    echo"<h5>$row[dataZadania]</h5>";
                    echo"<h5>$row[wpis]</h5>";
                echo"</div>";
                echo"<br>";
            }
            mysqli_close($conn);
        ?>
    </main>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>