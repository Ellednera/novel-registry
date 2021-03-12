<!DOCTYPE html>
<html>
	<head>
		<title>青春小说</title>
		<meta charset="UTF-8">
		<link href="css/general.css" type="text/css" rel="stylesheet"/> <!-- do not change anything in this css file -->
		<link href="css/menu.css" type="text/css" rel="stylesheet"> <!-- do not change anything in this css file -->
		<link href="css/members.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>
		<?php
		require("menu.php");
		?>
		<h1>青春小说城</h1>
		<!-- This login only grants access to additional features for the moment e.g. member's price, 
			redirect to index.php -->
		<!-- This login page is for future implementation -->
		
		<div id="login">
			<span>登录</span>
			<form id="login" method="POST" enctype="multipart/form-data">
				<input type="text" name="member_id" placeholder="会员编号" required/>
				<input type="password" name="password" placeholder="密码" required/>
				<input class="buttons" type="submit" value="登录">
			</form>
		</div>


	</body>
</html>