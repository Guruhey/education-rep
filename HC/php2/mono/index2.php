<html>
	<head>
		<meta charset="utf-8">
		<title>hph</title>
		<link rel="stylesheet" href="./css/style.css">
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
	#var_dump($_POST);
		if(isset($_POST['lastname']) && isset($_POST['name']) && isset($_POST['middlename']) && isset($_POST['years']) && isset($_POST['pol']) && isset($_POST['login']) && isset($_POST['password']) && isset($_POST['pass_again']) && isset($_POST['email']) && isset($_POST['about']))
		{
			if(filter_var($_POST['email'],  FILTER_VALIDATE_EMAIL))
			{
				if($_POST['password'] == $_POST['pass_again'])
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
							echo "Такой логин уже зарегистрирован.";
						} 
						else
						{
							file_put_contents($file, $str, FILE_APPEND);
						}
					}
					else $emptLogin = 'Вы ввели пустой логин';
				}
			else if($_POST['password'] != $_POST['pass_again']) echo  'Пароли не совпадают';
			}
			else if(!filter_var($_POST['email'],  FILTER_VALIDATE_EMAIL)) echo 'email invalid';
		}	
	?>
		<div class="osn_block">
			<form method=post> 
				<p>Фамилия</p><input type="text" name="lastname" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname'];?>">
				<p>Имя:</p><input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>">
				<p>Отчество</p><input type="text" name="middlename" value="<?php if(isset($_POST['middlename'])) echo $_POST['middlename'];?>">
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
				<p>Логин:</p><input type="text" name="login" value="<?php if(isset($_POST['login'])) echo $_POST['login'];?>"><span><?php if(isset($emptLogin)) echo $emptLogin;?></span>
				<p>Пароль:</p><input type="password" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'];?>">
				<p>Пароль:</p><input type="password" name="pass_again" value="<?php if(isset($_POST['pass_again'])) echo $_POST['pass_again'];?>">
				<p>e-mail:</p><input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
				<p>О себе:</p><textarea type="text" name="about"><?php if(isset($_POST['about'])) echo $_POST['about'];?></textarea><br>
				<input style="width:140px;" type="submit" value='Зарегистрировать'>
				<input style="width:140px;" type="reset" value='Reset'>
			</form>
		</div>
	</body>
</html>