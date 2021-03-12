<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	// echo $_POST["ISBN"];
	require("functions/_book_size_2_book_size_id.php");
	$book_size_id = _book_size_2_book_size_id($_POST["book_size"]);
	require("functions/_update_book_details.php");
	_update_book_details($_POST, $_GET["ISBN"], $book_size_id);
	$header_location = "Location: view_book_list.php?ISBN=" . $_POST["ISBN"] . "";
	header($header_location);
}
?>
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
		<h1>修改书单</h1>
		<?php
			require("functions/_get_book_list.php");
			_get_book_list("edit");
		?>
	</body>
</html>