<html>
	<head>
		<meta charset="utf-8">
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
					<a href="./index2.php">Регистрация</a>
				</div>
				<?php
			$flag = false;
			$flag1 = false;
			if(isset($_POST['username']) && isset($_POST['pwd']))
			{
				function lines($file) 
				{ 
					if(!file_exists($file))exit("Файл не найден"); 
					$file_arr = file($file); 
					$lines = count($file_arr); 
					return $lines; 
				}
						$file = "login.txt";
						$tmp = file_get_contents($file, true);
						$line = explode("\n", $tmp);
						$index = lines($file); 
						for($i = 0; $i < $index; $i++)
						{ 
							$cell = explode("|", $line[$i]);
							if(@$cell[5] == $_POST['username'])
							{ 
								$flag1 = false;
								if(@$cell[6] == $_POST['pwd'])
								{ 
									echo 'Привет, '.$cell[1]." ".$cell[2];
									echo '<br><a style="position:relative;left:-30px;top:250px;" href="./index.php">Выход</a>';
									$flag = true;
								}
								else if(@$cell[6] != $_POST['pwd'])
								{
									$flag1 = true;
								}		
								break;
								#echo 'Вы ввели неправильный логин или пароль';
							}
							else if(@$cell[5] != $_POST['username']) $flag1 = true;
						}
			}
			
					if($flag == false)
					{
							echo '<div class="rightcont">
							<h1>Вход</font></h1>
							<form class="tex" method="post">
								<p class="hey"><b>Имя пользователя</b></p>
								<input id="username" name="username"size="20">
								<p class="hey"><b>Пароль</b></p>
								<input type="password" name="pwd">
								<br>';
								if($flag1 == true)
								{
									echo '<span style="color:red;">Вы ввели неправильный логин или пароль</span><br/>';
								}
								echo '<input type="submit" value="Вход">
								
							</form>
						</div>';
					}
					/*else if($_POST['username'] == $log && $_POST['pwd'] == $pwd)
					{
						echo 'Привет, '.$log;
						echo '<br><a style="position:relative;left:-30px;top:250px;" href="./index.php">Выход</a>';
					}
					else if($_POST['username'] != $log || $_POST['pwd'] != $pwd)
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
					}*/
			
				?>
			</div>
		</div>
	</body>
</html>