<?php

$username1 = $_COOKIE['user'];
$psw1 = $_COOKIE['psw'];

$username = filter_var(trim($_POST['username']),
FILTER_SANITIZE_STRING);
$psw = filter_var(trim($_POST['psw']),
FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']),
FILTER_SANITIZE_STRING);


if(mb_strlen($username) < 2 || mb_strlen($username) > 90) {
	echo "Недопустимая длина имени пользователя";
	exit();
}

$mysql = mysqli_connect('localhost', 'mysql', 'mysql', 'termo_house') 
    or die("Ошибка " . mysqli_error($mysql));

$query = "UPDATE `user` SET `username`='$username', `E-mail`='$email' WHERE `username`= '$username1' AND `Password`='$psw1'";

$result = mysqli_query($mysql, $query) or die("Ошибка " . mysqli_error($mysql));

$result1 = $mysql -> query("SELECT * FROM `user` WHERE `username`='$username' AND `Password` = '$psw'");
$user = $result1 -> fetch_assoc();

setcookie('user', $user['username'], time() + 3600, "/");

setcookie('psw', $user['Password'], time() + 3600, "/");



mysqli_close($mysql);

header('Location:  Личный кабинет.php');
?>