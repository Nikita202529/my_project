<?php

$username = filter_var(trim($_POST['username']),
FILTER_SANITIZE_STRING);
$psw = filter_var(trim($_POST['psw']),
FILTER_SANITIZE_STRING);

$mysql = mysqli_connect('localhost', 'mysql', 'mysql', 'termo_house') 
    or die("Ошибка " . mysqli_error($mysql));

$result = $mysql -> query("SELECT * FROM `user` WHERE `username`='$username' AND `Password` = '$psw'");
$user = $result -> fetch_assoc();

if(count($user) == 0) {
	echo "Пользователь не найден, пожалуйста зарегестрируйтесь.";
	exit();
}

setcookie('user', $user['username'], time() + 3600, "/");

setcookie('psw', $user['Password'], time() + 3600, "/");

mysqli_close($mysql);

header('Location:  Личный кабинет.php');
?>