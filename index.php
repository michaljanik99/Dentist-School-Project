<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Gabinet Dentystyczny</title>
</head>
<header>
    <nav>
        <!-- Odnośniki do podstron -->
        <a href="index.php"><img src='logo.png'></a>
        <a href="wyswietl.php">WSZYSTKIE WIZYTY</a>
        <a href="zapisz.php">DODAJ WIZYTĘ</a>
    </nav>
</header>
<main>
    <header></header>
    <section>
        <div class="p1">Aplikacja komercyjna</div>
        <div class="p2">W fazie testowania</div>
        <div class="p3">Tel:<b>888 888 888</b><div>
    </section>
    <article>
    <div class="info">
         <h3>Przypominacz</h3>
                <?php include("connect.php");
                    // Pobranie wizyty z dnia obecnego z najwcześnieszym czasem wizyty
                    $result = $connect->query("SELECT  imie,nazwisko,data,TIME_FORMAT(czas,'%H:%i') FROM wizyty WHERE data=CURRENT_DATE() ORDER BY czas ASC LIMIT 1");
                    if($result === false){
                        exit("Zapytanie zwróciło błąd");
                    }
                    else{
                        $row = mysqli_fetch_assoc($result);
                        echo $row['imie'].' ';
                        echo $row['nazwisko'].' ';
                        echo $row['data'].' ';
                        echo 'godzina ';
                        echo $row["TIME_FORMAT(czas,'%H:%i')"];
                        }
                ?>
<br><br>
<hr>
        <h3>Wizyt:</h3>
                <?php include("connect.php");
                    //Pobranie ilości wizyt z dnia obecnego 
                    $result1 = $connect->query("SELECT COUNT(id) FROM wizyty WHERE data=CURRENT_DATE()");
                    //Pobranie ilości wizyt odbytych
                    $result2 = $connect->query("SELECT COUNT(id) FROM wizyty WHERE data < CURRENT_DATE()");
                    if($result1 === false || $result2 === false){
                        exit("Zapytanie zwróciło błąd");
                    }
                    else{
                        $row1 = $result1->fetch_assoc();
                        $row2 = $result2->fetch_assoc();
                        echo'Dzisiaj: ';
                        echo'<b>'.$row1['COUNT(id)'].'</b>  ';
                        echo'Wszystkich: ';
                        echo '<b>'.$row2['COUNT(id)'].'</b>';
                    }
                ?>
<br><br><br>
        <h3>Lecznie kanałowe z użyciem MIKROSKOPU</h3>
        <div id='price'></div>
                   <script src='select.js'></script>
                        <!-- Lista z cenami zabiegów -->
                        <SELECT id='lista' onchange='opcja()'>
                              <OPTION VALUE="100">Dewitalizacja
                              <OPTION VALUE="400">Zęby jednokanałowe
                              <OPTION VALUE="500">Zęby dwukanałowe
                              <OPTION VALUE="650">Zęby trzykanałowe
                              <OPTION VALUE="750">Zęby czterokanałowe
                              <OPTION VALUE="50-110">Reendo dodatkowo
                              <OPTION VALUE="150-200">Zamknięcie perforacji
                              <OPTION VALUE="200-300">Wyciągnięcie złamanego narzędzia
                              <OPTION VALUE="350-450">Wzmocnenie zęba włóknem szklanym       
                        </SELECT>
        </div>
        <div class="lore">
        <h3>Dentysta</h3>
        <img src="obraz1.png">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."Fragment 1.10.32 z "de Finibus Bonorum et Malorum", napisanej przez Cycerona w 45 r.p.n.e."Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
        </div>
    </article>
</main>
<footer>
    &copy;Copyright
</footer>
<body>
</body>
</html>