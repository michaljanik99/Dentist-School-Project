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
        <h1>Formularz rejestracyjny</h1>
        <div id="notification"></div>
            <!-- Formularz dodawania informacji do rejestru -->
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                <label>Imię: </label><input type="text" name="imie" id="imie" pattern="[A-Z][a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]{1,}" required title="Dopuszczalne są tylko litery,pierwsza litera duża" >
            <br>
                <label>Nazwisko: </label><input type="text" name="nazwisko" id="nazwisko" pattern="[A-ZĄĘŁŃÓŚŹŻ][a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]{1,}" required title="Dopuszczalne są tylko litery,pierwsza litera duża" >
            <br>
                <label>Pesel: </label><input type="text"  name="pesel" id="pesel" pattern="[0-9]{11}" required
                 title="PESEL 11 cyfrowy" >
            <br>
                <label>Data wizyty: </label><input type="date" id="data" name="data" required >
            <br>
                <label>Czas: </label><input type="time" id="czas" name="czas"  required >
            <br>
                <label>Telefon: </label><input type="text" name="telefon" id="telefon" pattern="[0-9]{1,15}" required title="Dopuszcalne tylko liczby i maksymlna ilości znaków 15" >
            <br>
                <input type="submit" value="Zarejestruj" name="sub" id="sub">
                <input type="reset">
            </form>
                   <?php include("connect.php");
                      //Pobranie wartości inuptów
                      if(isset($_POST['sub']) ){
                         $i = $_POST['imie'];
                         $n = $_POST['nazwisko'];
                         $p = $_POST['pesel'];
                         $d = $_POST['data'];
                         $t = $_POST['telefon'];
                         $c = $_POST['czas'];
                            //Sprawdzenie czy data nie jest mniesza od obecnej 
                            if(date("Y-m-d")>$d){
                                echo "<script src='alert.js'></script>"; 
                            }
                            else{
                                //Sprawdzenie czy użytkownik jest już zarejstrowany na dany dzień i godzinę
                                $przedZapytanie = mysqli_query($connect,"SELECT * FROM wizyty WHERE pesel = '$p' AND data ='$d' AND imie='$i' AND nazwisko='$n' AND czas='$c'");
                                    if(mysqli_num_rows($przedZapytanie)>0){
                                        echo "<script src='alert2.js'></script>";  
                                    }
                                    else{
                                        //Sprawdzenie czy inny uzytkownik nie jest zarejstwany na ten sam termin
                                        $przedZapytanie1 = mysqli_query($connect,"SELECT * FROM wizyty WHERE  data ='$d' AND czas = '$c'");
                                              if(mysqli_num_rows($przedZapytanie1)>0){
                                                 echo "<script src='alert3.js'></script>";
                                              } 
                                              else{
                                                  //Wprowadzenie danych do bazy
                                                  $zapytanie = $connect->prepare("INSERT  wizyty(imie,nazwisko,pesel,data,czas,telefon) VALUES (?,?,?,?,?,?)");
                                                  $zapytanie->bind_param("ssissi",$i,$n,$p,$d,$c,$t);
                                                  $zapytanie->execute();
                                                  $zapytanie->close();
                                                  echo "<script src='alert4.js'></script>"; 
                                              } 
                                        }
                                }
                        }
                   ?>
    </article>
</main>
<footer>
    &copy;Copyright
</footer>
<body>
</body>
</html>