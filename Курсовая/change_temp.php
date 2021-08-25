<?php

$house_ID = $_COOKIE['house'];

$id_house = filter_var(trim($_POST['id_house']),
FILTER_SANITIZE_STRING);


if($id_house < 15 || $id_house > 30) {
	echo "Недопустимая температура дома";
	exit();
}

$mysql = mysqli_connect('localhost', 'mysql', 'mysql', 'termo_house') 
    or die("Ошибка " . mysqli_error($mysql));

 $sql = "SELECT `House_temperature` FROM `house_temperature` WHERE `ID`= '$house_ID'";

 $result1 = mysqli_query($mysql, $sql) or die("Ошибка " . mysqli_error($mysql));

 $query = "UPDATE `house_temperature` SET `House_temperature`='$id_house' WHERE `ID`= '$house_ID'";

 $result = mysqli_query($mysql, $query) or die("Ошибка " . mysqli_error($mysql));


mysqli_close($mysql);

header('Location:  Личный кабинет.php');
?>