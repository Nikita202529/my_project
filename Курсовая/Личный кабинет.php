<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="First.css">
	<title>Личный кабинет</title>
</head>
<body>
	<header>
	<div class="Logo"><h1>Контроль температуры и управление отоплением в умном доме</h1>
	</div>
	<div class="topnav">
         <a class="active" href="Termo House.htm">Главная</a>
         <a href="#">Личный кабинет</a>
         <a href="Контакты.htm">Контакты</a>
         <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;" class="Sign_Up">Регистрация
       </button>
         <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="Sign_Up">Авторизация
	     </button>
    </div>
	
	<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>

  <form class="modal-content" action="auto.php" method="post">
    <div class="container">
      <h1>Авторизация</h1>
      <p>Пожалуйста заполните эти поля для входа в аккаунт.</p>
      <hr>
      <label for="username"><b>Введите имя пользователя</b></label>
      <input type="text" placeholder="Введите имя пользователя" name="username" required>

      <label for="psw"><b>Пароль</b></label>
      <input type="password" placeholder="Введите пароль" name="psw" required>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Выход</button>
        <button type="submit" class="signupbtn">Авторизация</button>
      </div>
    </div>
  </form>
</div>
<script>
let modal = document.getElementById('id01');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
  
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">×</span>

  <form class="modal-content" action="chek.php" method="post">
    <div class="container">
      <h1>Регистрация</h1>
      <p>Пожалуйста заполните эти поля для регистрации.</p>
      <hr>
      <label for="username"><b>Введите имя пользователя</b></label>
      <input type="text" placeholder="Введите имя пользователя" name="username" required>

      <label for="psw"><b>Пароль</b></label>
      <input type="password" placeholder="Введите пароль" name="psw" required>

      <label for="email"><b>Адрес электронной почты</b></label>
      <input type="email" placeholder="Введите адрес электронной почты" name="email" required>

      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Запомнить меня
      </label>
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Выход</button>
        <button type="submit" class="signupbtn">Регистрация</button>
      </div>
    </div>
  </form>
</div>
<script>
let modal = document.getElementById('id02');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

	</header>

  <?php
  if($_COOKIE['user'] == ''):
  ?> 

<div class="About"><h2>Пожалуйста войдите в аккаунт или зарегестрируйтесь.</h2>
</div>

  <?php else:?>

	<main>
		<div class="About"><h2>Личный кабинет</h2>
      <hr>
		<div class="img"><img src="https://pbs.twimg.com/media/DXBV4FvXcAEXrMl.jpg"></div>
		<div class="Text">
      
<label>

  <b class="LK">Имя пользователя:<b class="LK1">
<?php
$username = $_COOKIE['user'];
$psw = $_COOKIE['psw'];

$mysql = mysqli_connect('localhost', 'mysql', 'mysql', 'termo_house') 
    or die("Ошибка " . mysqli_error($mysql));

$result = mysqli_query($mysql, "SELECT `username`, `E-mail` FROM `user` WHERE `username`= '$username' AND `Password` = '$psw'");

$user = $result -> fetch_assoc();

print_r($user['username'] ."<br>\n");

      ?>
      </b>
      </b>
      <br></br>
      <b class="LK">Адрес электронной почты:<b class="LK1">
<?php
$username = $_COOKIE['user'];
$psw = $_COOKIE['psw'];

$mysql = mysqli_connect('localhost', 'mysql', 'mysql', 'termo_house') 
    or die("Ошибка " . mysqli_error($mysql));

$result = mysqli_query($mysql, "SELECT `username`, `E-mail` FROM `user` WHERE `username`= '$username' AND `Password` = '$psw'");

$user = $result -> fetch_assoc();

print_r($user['E-mail'] ."<br>\n");
      ?>
      </b>
      </b>
      <br></br>
<b class="change1">Если вы хотите изменить свои данные, нажмите здесь <button onclick="document.getElementById('id03').style.display='block'" style="width:auto;" class="change">Изменить
       </button>
     </b>
    </label>

     <div id="id03" class="modal">
  <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">×</span>

  <form class="modal-content" action="change.php" method="post">
    <div class="container1">
      <h1>Изменение данных</h1>
      <p>Пожалуйста заполните эти поля для изменения личных данных.</p>
      <hr>
      <label for="username"><b>Введите имя пользователя</b></label>
      <input type="text" placeholder="Введите имя пользователя" name="username" required>

      <label for="email"><b>Адрес электронной почты</b></label>
      <input type="email" placeholder="Введите адрес электронной почты" name="email" required>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Выход</button>
        <button type="submit" class="signupbtn">Изменить</button>
      </div>
    </div>
  </form>
</div>
<script>
let modal = document.getElementById('id03');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<br></br>
<b class="house">Нажмите, чтобы посмотреть температуру в доме <button onclick="document.getElementById('id04').style.display='block'" style="width:auto;" class="change">Посмотреть
       </button>
     </b>

          <div id="id04" class="modal">
  <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">×</span>

  <form class="modal-content" action="house.php" method="post">
    <div class="container1">
      <h1>Мой дом</h1>
      <p>Пожалуйста заполните эти поля для поиска дома в системе контроля.</p>
      <hr>

      <label for="id_house"><b>Введите ID номер дома</b></label>
      <input type="number" placeholder="Введите ID номер дома" name="id_house" required>

      <label for="psw"><b>Пароль</b></label>
      <input type="password" placeholder="Введите пароль от дома" name="psw" required>

      <label for="psw"><b>Данные вы можете посмотреть в договоре об оказании услуг, выданном вам после установки обарудования.</b></label>
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Выход</button>
        <button type="submit" class="signupbtn">Посмотреть</button>
      </div>
    </div>
  </form>
</div>
<script>
let modal = document.getElementById('id04');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
    
    <?php
  if($_COOKIE['Password_house'] != ''):
  ?>

  <br></br>
      <b class="LK">Адрес дома:<b class="LK1">
<?php
$id_house = $_COOKIE['house'];
$psw = $_COOKIE['Password_house'];

$mysql = mysqli_connect('localhost', 'mysql', 'mysql', 'termo_house') 
    or die("Ошибка " . mysqli_error($mysql));

$result = mysqli_query($mysql, "SELECT `Adres`, `Square` FROM `house` WHERE `ID`= '$id_house' AND `Password_house` = '$psw'");

$house = $result -> fetch_assoc();

print_r($house['Adres'] ."<br>\n");
      ?>
      </b>
      </b>
<!--  Температура дома -->
<br></br>
<b class="LK">Температура в доме [С]:<b class="LK1">
<?php
$id_house = $_COOKIE['house'];
$psw = $_COOKIE['Password_house'];

$mysql = mysqli_connect('localhost', 'mysql', 'mysql', 'termo_house') 
    or die("Ошибка " . mysqli_error($mysql));

$result = mysqli_query($mysql, "SELECT `House_temperature` FROM `house_temperature` WHERE `ID`= '$id_house'");

$house = $result -> fetch_assoc();

print_r($house['House_temperature'] ."<br>\n");
      ?>
      </b>
      </b>
<!--  Температура на улице -->
<br></br>
<b class="LK">Температура на улице [С]:<b class="LK1">
<?php
$id_house = $_COOKIE['house'];
$psw = $_COOKIE['Password_house'];

$mysql = mysqli_connect('localhost', 'mysql', 'mysql', 'termo_house') 
    or die("Ошибка " . mysqli_error($mysql));

$result = mysqli_query($mysql, "SELECT `Street_temperature` FROM `street_temperature` WHERE `ID`= '$id_house'");

$house = $result -> fetch_assoc();

print_r($house['Street_temperature'] ."<br>\n");
      ?>
      </b>
      </b>

<!--  Температура в комнатах -->
<br></br>
<b class="LK">Температура в комнатах [C]: <br></br><b class="LK1">
<?php
$id_house = $_COOKIE['house'];
$psw = $_COOKIE['Password_house'];

$mysql = mysqli_connect('localhost', 'mysql', 'mysql', 'termo_house') 
    or die("Ошибка " . mysqli_error($mysql));

$sql = "SELECT room.Name, room_temperature.Room_temperature FROM room, room_temperature WHERE room.ID_rooms = '$id_house' AND room.Room_temperature = room_temperature.ID";

$result = mysqli_query($mysql,$sql);

while($room_names = $result -> fetch_assoc()) 
{
  print_r($room_names['Name'] . ": ".$room_names['Room_temperature']."<br></br>");
}
      ?>
      </b>
      </b>
<b class="house">Нажмите, чтобы изменить температуру в доме <button onclick="document.getElementById('id05').style.display='block'" style="width:auto;" class="change">Изменить
       </button>
     </b>

          <div id="id05" class="modal">
  <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">×</span>

  <form class="modal-content" action="change_temp.php" method="post">
    <div class="container1">
      <h1>Изменить температуру</h1>
      <p>Пожалуйста заполните эти поля для изменения температуры дома.</p>
      <hr>

      <label for="id_house"><b>Введите желаемую температуру дома</b></label>
      <input type="number" placeholder="Введите желаемую температуру дома" name="id_house" required>

      <label><b>Температура в доме будет постепенно изменена до указанного вами значения.
        </b></label>
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id05').style.display='none'" class="cancelbtn">Выход</button>
        <button type="submit" class="signupbtn">Изменить</button>
      </div>
    </div>
  </form>
</div>
<script>
let modal = document.getElementById('id05');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

   <?php endif; ?>
    </div>
    </div>
	</main>
  <?php endif; ?>

	<footer>
		<div class="topnav1">
         <a class="active1" href="Termo House.htm">Главная</a>
         <a href="#">Личный кабинет</a>
         <a href="Контакты.htm">Контакты</a>
         <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;" class="Sign_Up">Регистрация
       </button>
         <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="Sign_Up">Авторизация
	     </button>
    </div>
	</footer>
</body>
</html>