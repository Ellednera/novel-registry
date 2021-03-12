<!DOCTYPE html>
<html>
	<head>
		<title>青春小说</title>
		<meta charset="UTF-8">
		<link href="css/general.css" type="text/css" rel="stylesheet"/> <!-- do not change anything in this css file -->
		<link href="css/menu.css" type="text/css" rel="stylesheet"> <!-- do not change anything in this css file -->
		<link href="css/book_list.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>
		<?php
		require("menu.php");
		?>
		<h1>查看书籍</h1>
		<?php
			require("functions/_get_book_list.php");
			_get_book_list("view");
		?>
	</body>
</html>