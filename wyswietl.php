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
         <?php include("connect.php");
         echo'<table class="table-fill">';
         echo'<thead>';
         echo'<tr>';
         echo'<th class="text-left">Imię</th>';
         echo'<th class="text-left">Nazwisko</th>';
         echo'<th class="text-left">Pesel</th>';
         echo'<th class="text-left">Data wizyty</th>';
         echo'<th class="text-left">Godzina wizyty</th>';
         echo'<th class="text-left">Telefon</th>';
         echo'</tr>';
            //Pobranie wizyt z dnia obecnego i wcześniejszych
            $result = $connect->query(" SELECT id,imie,nazwisko,pesel,data,TIME_FORMAT(czas,'%H:%i'),telefon FROM wizyty WHERE data<=CURRENT_DATE() ORDER BY data DESC,czas ASC");
                if($result === false){
                    exit("nieee");
                }
                while($post = mysqli_fetch_array($result)){
                    echo'<tr>';
                    echo'<td class="text-left">'.$post['imie'].'</td>';
                    echo'<td class="text-left">'.$post['nazwisko'].'</td>';
                    echo'<td class="text-left">'.$post['pesel'].'</td>';
                    echo'<td class="text-left">'.$post['data'].'</td>';
                    echo'<td class="text-left">'.$post["TIME_FORMAT(czas,'%H:%i')"].'</td>';
                    echo'<td class="text-left">'.$post['telefon'].'</td>';
                    echo'</tr>';
                }
                   echo'</tbody>';
                   echo'</table>';
         ?>
    </article>
</main>
<footer>
    &copy;Copyright
</footer>
<body>
</body>
</html>