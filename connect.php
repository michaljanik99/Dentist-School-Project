
  <?php
  $connect = @new mysqli('localhost','root', '','gabinet');
  if (mysqli_connect_errno() != 0){
    echo '<p>Wystąpił błąd połączenia: ' . mysqli_connect_error() . '</p>';
  }
  else {
    mysqli_set_charset($connect,"utf8");
  }
  
 



?>