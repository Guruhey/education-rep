<html>
	<head>
		<meta charset="utf-8">
		<title>make america great again</title>
		<link rel="stylesheet" href="./css/stylephp1.css">
	</head>
	<body>
	<div class="osn_block">
		<div class="container">
			<div class="menu">
				<form method=post> 
					<input type="search" name="url" placeholder="Поиск по сайту" value="<?php if(isset($_POST['url'])) echo $_POST['url'];?>"> 
					<select name="spisok">
						<option value="1">ФИО</option>
						<option value="2">Дата</option>
						<option value="3">email</option>
						<option value="4">Моб.телефон</option>
						<option value="5">Почтовый индекс</option>
					</select>
					<br>
					<input type="submit" value="Найти">
				</form>
			</div>
		</div>
	</div>
	<?php
	if(isset($_POST['url']))
	{
		$url = $_POST['url'];
		$url = iconv("UTF-8","windows-1251",$url);
		$html = file_get_contents($url);
		$res = iconv("windows-1251","UTF-8",$html);
		if($_POST['spisok'] == 1)
		{
			$regul = "/[А-Я][а-я]+\s[А-Я][а-я]+\s[А-Я][а-я]+/u";
		}
		if($_POST['spisok'] == 2)
		{
			$regul = "/(19|20)\d\d-((0[1-9]|1[012])-(0[1-9]|[12]\d)|(0[13-9]|1[012])-30|(0[13578]|1[02])-31)/";
		}
		if($_POST['spisok'] == 3)
		{
			$regul = "/(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})/";
		}
		if($_POST['spisok'] == 4)
		{
			$regul = "/[8]\([0-9]{3}\)[0-9]{3}\-[0-9]{2}\-[0-9]{2}/";
		}
		if($_POST['spisok'] == 5)
		{
			$regul = "/[0-9]{6}/";
		}
		$g = 0;
		$result_index = preg_match_all($regul, $res, $result, PREG_PATTERN_ORDER);
		if ($result_index == 0)
		{
			echo "<Div style=\"width:300px;\\margin:0 auto;\">".'ничего не найдено'."</Div>";
		}
		else
		{
			for($i = 0; $i < $result_index; $i++)
			{
				$g = $g + 1;
				echo "<Div style=\"width:300px;\\margin:0 auto;\">".$g." ".@$result[0][$i]."</Div>";
			}
		}
	}
?>
	</body>
</html>