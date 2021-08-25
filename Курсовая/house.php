<?php

$id_house = filter_var(trim($_POST['id_house']),FILTER_SANITIZE_STRING);
$psw = filter_var(trim($_POST['psw']),
FILTER_SANITIZE_STRING);


$mysql = mysqli_connect('localhost', 'mysql', 'mysql', 'termo_house') 
    or die("Ошибка " . mysqli_error($mysql));

$result = $mysql -> query("SELECT * FROM `house` WHERE `ID`='$id_house' AND `Password_house` = '$psw'");
$house = $result -> fetch_assoc();

setcookie('house', $house['ID'], time() + 3600, "/");

setcookie('Password_house', $house['Password_house'], time() + 3600, "/");

mysqli_close($mysql);

header('Location:  Личный кабинет.php');
?>