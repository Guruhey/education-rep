<html>
	<head>
		<meta charset="utf-8">
		<title>hph</title>
		<link rel="stylesheet" href="./css/style1.css">
	</head>
	<body>
	<?php
	function lines($file) 
	{ 
		if(!file_exists($file))exit("Файл не найден"); 
		$file_arr = file($file); 
		$lines = count($file_arr); 
		return $lines; 
	} 
	$flag = false;
		if(isset($_POST['lastname']) && isset($_POST['name']) && isset($_POST['middlename']) && isset($_POST['years']) && isset($_POST['pol']) && isset($_POST['login']) && isset($_POST['password']) && isset($_POST['pass_again']) && isset($_POST['email']) && isset($_POST['about']))
		{
			if(!preg_match( "/(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})/", $_POST['email']))
			{
				$flag = true;
				$invem = '<br>Вы ввели некоректный email';
			}
			if(!preg_match( "/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $_POST['password']))
			{
				$flag = true;
				$pwdinc = '<br>Пароль не соответствует условиям';
			}
			if($_POST['password'] != $_POST['pass_again'])
			{
				$flag = true;
				$errpwd = '<br>Пароли не совпадают';
			}
			if(empty($_POST['password']))
			{
				$flag = true;
				$emppwd = '<br> Вы не ввели пароль';
			}
			if(empty($_POST['lastname']))
			{
				$flag = true;
				$emplastname = '<br> Вы не ввели фамилию';
			}
			if (!preg_match("/^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$/", $_POST['login']))
			{
				$flag = true;
				$logininc = '<br>Введите корректный login';
			}
			if(empty($_POST['name']))
			{
				$flag = true;
				$empname = '<br> Вы не ввели имя';
			}
			if (!preg_match("/^[А-Яа-я]+$/u", $_POST['name']))
			{
				$flag = true;
				$nameinv = '<br> Введите имя кирилицей';
			}
			if (!preg_match("/^[А-Яа-я]+$/u", $_POST['lastname']))
			{
				$flag = true;
				$lastnameinv = '<br> Введите имя кирилицей';
			}
			if (!preg_match("/^[А-Яа-я]+$/u", $_POST['middlename']))
			{
				$flag = true;
				$middlenameinv = '<br> Введите имя кирилицей';
			}
			if (!preg_match("/^[А-Яа-я]+$/u", $_POST['name']))
			{
				$flag = true;
				$nameinv = '<br> Введите имя кирилицей';
			}
			if(empty($_POST['middlename']))
			{
				$flag = true;
				$midname = '<br>Вы ввели пустое отчество';
			}
			if($flag == false)
			{
				$file = 'login.txt'; 
				$str = $_POST['lastname']."|".$_POST['name']."|".$_POST['middlename']."|".$_POST['years']."|".$_POST['pol']."|".$_POST['login']."|".$_POST['password']."|".$_POST['email']."|".$_POST['about']."\n"; 
				if(!empty($_POST['login']))
				{
					$tmp = file_get_contents($file, true);
					$line = explode("\n", $tmp);
					$index = lines($file); 
					for($i = 0; $i < $index; $i++)
					{ 
						$cell = explode("|", $line[$i]);
						if(@$cell[5] == $_POST['login'])
						{
							$flag = true;
							break;
						}
					}
					if($flag == true) 
					{
						$samelog = "<br>Такой логин уже зарегистрирован.";
					}
					else
					{
						file_put_contents($file, $str, FILE_APPEND);
						$win =  '<br>Аккаунт успешно создан';
					}
				}
				else $emptLogin = '<br>Вы ввели пустой логин';
			}
		}
	?>
		<div class="osn_block container1">
			<form method=post> 
				<p>Фамилия</p><input type="text" name="lastname" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname'];?>"><span style="color:red;"><?php if(isset($emplastname)) echo $emplastname;?></span><span style="color:red;"><?php if(isset($lastnameinv)) echo $lastnameinv;?></span>
				<p>Имя:</p><input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>"><span style="color:red;"><?php if(isset($empname)) echo $empname;?></span><span style="color:red;"><?php if(isset($nameinv)) echo $nameinv;?></span>
				<p>Отчество</p><input type="text" name="middlename" value="<?php if(isset($_POST['middlename'])) echo $_POST['middlename'];?>"><span style="color:red;"><?php if(isset($midname)) echo $midname;?></span><span style="color:red;"><?php if(isset($middlenameinv)) echo $middlenameinv;?></span>
				<p>Пол:</p>
				<select name="pol" value="<?php if(isset($_POST['pol'])) echo $_POST['pol'];?>">
					<option>Муж</option>
					<option>Жен</option>
				</select>
				<p>Возраст:</p>
				<select name="years" value="<?php if(isset($_POST['years'])) echo $_POST['years'];?>">
					<option>1-10</option>
					<option>11-20</option>
					<option>21-30</option>
					<option>31-40</option>
					<option>41-50</option>
					<option>51-60</option>
					<option>61-70</option>
				</select>
				<p>Логин:</p><input type="text" name="login" value="<?php if(isset($_POST['login'])) echo $_POST['login'];?>"><span style="color:red;"><?php if(isset($emptLogin)) echo $emptLogin;?></span><span style="color:red;"><?php if(isset($samelog)) echo $samelog;?></span><span style="color:red;"><?php if(isset($logininc)) echo $logininc;?></span>
				<p>Пароль:</p><input type="password" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'];?>"><span style="color:red;"><?php if(isset($errpwd)) echo $errpwd;?></span><span style="color:red;"><?php if(isset($emppwd)) echo $emppwd;?></span><span style="color:red;"><?php if(isset($pwdinc)) echo $pwdinc;?></span>
				<p>Повторите пароль</p><input type="password" name="pass_again" value="<?php if(isset($_POST['pass_again'])) echo $_POST['pass_again'];?>">
				<p>e-mail:</p><input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"><span style="color:red;"><?php if(isset($invem)) echo $invem;?></span>
				<p>О себе:</p><textarea type="text" name="about"><?php if(isset($_POST['about'])) echo $_POST['about'];?></textarea><br>
				<span style="color:lime;"><?php if(isset($win)) echo $win;?></span>
				<input class="sub" type="submit" value='Регистрация'>
				<input style="width:75px;"class="res" type="reset" value='Reset'><br>
			</form>
		</div>
		<div class="line"><a class="ssilka" href="./index.php">Назад</a></div>
	</body>
</html>