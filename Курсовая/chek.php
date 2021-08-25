<?php

$username = filter_var(trim($_POST['username']),
FILTER_SANITIZE_STRING);
$psw = filter_var(trim($_POST['psw']),
FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']),
FILTER_SANITIZE_STRING);


if(mb_strlen($username) < 2 || mb_strlen($username) > 90) {
	echo "Недопустимая длина имени пользователя";
	exit();
} else if(mb_strlen($psw) < 4 || mb_strlen($psw) > 30) {
	echo "Недопустимая длина пароля";
	exit(); }


$mysql = mysqli_connect('localhost', 'mysql', 'mysql', 'termo_house') 
    or die("Ошибка " . mysqli_error($mysql));

$mysql -> query("INSERT INTO `user` (`username`, `Password`, `E-mail`) VALUES('$username', '$psw', '$email')");

$result = $mysql -> query("SELECT * FROM `user` WHERE `username`='$username' AND `Password` = '$psw'");
$user = $result -> fetch_assoc();

setcookie('user', $user['username'], time() + 3600, "/");

setcookie('psw', $user['Password'], time() + 3600, "/");

mysqli_close($mysql);

header('Location:  Личный кабинет.php');
?>