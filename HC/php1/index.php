<html>
	<head>
		<title>HAPKOTuKu</title>
		<link rel="stylesheet" href="./css/style.css">
	</head>
	<body>
		<div class="content container">
			<div class="sht">
				<div class="leftcont">				
					<div class="monik">
						<img src="./images/4k.PNG">
					</div>				
					<span>Добро пожаловать!</span>
						<div class="text">
							<p>Введите правильные имя</p>
							<p>пользователя и пароль для</p>
							<p>входа на сайт!</p>
						</div>
					<a href="#">Регистрация</a>
				</div>

				<?php $log = "guruhey"; $pwd = "12345";
					if(!isset($_POST['pwd']))
					{
								echo '<div class="rightcont">
							<h1>Вход</font></h1>
							<form class="tex" method="post">
								<p class="hey"><b>Имя пользователя</b></p>
								<input id="username" name="username"size="20">
								<p class="hey"><b>Пароль</b></p>
								<input type="password" name="pwd">
								<br>
								<input type="submit" value="Вход">
							</form>
						</div>';
					}
					else if($_POST['username'] == $log && $_POST['pwd'] == $pwd)
					{
						echo 'Привет, '.$log;
					}
					else if($_POST['username'] != $log && $_POST['pwd'] != $pwd)
					{	
						echo '<div class="rightcont">
							<h1>Вход</font></h1>
							<span style="color:red;">Вы ввели неправельные данные</span>
							<form style="height:180px;" class="tex" method="post">
								<p class="hey"><b>Имя пользователя</b></p>
								<input id="username" name="username"size="20">
								<p class="hey"><b>Пароль</b></p>
								<input type="password" name="pwd">
								<br>
								<input type="submit" value="Вход">
							</form>
						</div>';
					}
				?>
			</div>
		</div>
	</body>
</html>