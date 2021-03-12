<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// echo "<pre>";
	// var_dump($_POST);
	// echo "</pre>";
	
	// check for existing ISBN code
	$sieze_db = mysqli_connect("localhost", "root", "", "novel") or die("无法与数据库沟通。");
	$find = "SELECT `book_title`, `quantity` FROM `books`
				WHERE
				`ISBN`='" . $_POST["ISBN"] . "'
				AND
				`deleted`=0
				;";
	$operation_find = mysqli_query($sieze_db, $find) or die("抱歉，命令不清楚。无法继续帮您查询。");
	$book_found = mysqli_fetch_all($operation_find, MYSQLI_ASSOC) or $register_new_book = true;
	mysqli_close($sieze_db);
	
	if(isset($register_new_book) && $register_new_book = true){
		// convert book_size to book_id first
		require("functions/_book_size_2_book_size_id.php");
		$book_size_id = _book_size_2_book_size_id($_POST["book_size"]);
		
		$sieze_db = mysqli_connect("localhost", "root", "", "novel") or die("无法与数据库沟通。");
		# inserting and updating values into tables require the letter "N" to be in front of the string since the data type is Nvarchar
		$command = "INSERT INTO `books`
					VALUES
					('',
					'" . $_POST["ISBN"] . "', 
					N'" . strip_tags(addslashes($_POST["book_title"])) . "', 
					N'" . strip_tags(addslashes($_POST["author"])) . "', 
					'" . $book_size_id . "', 
					N'" . nl2br(strip_tags(addslashes($_POST["description"]))) . "', 
					'', 
					'" . $_POST["quantity"] . "', 
					'',
					'',
					'',
					0);
					";
		$add_book = mysqli_query($sieze_db, $command) or die("呃...SQL命令有误。请审查。");
		mysqli_close($sieze_db);
		echo "成功把《" . $_POST["book_title"] . "》记录进数据库。";
	}else{
		echo("不好意思，《" . $_POST["book_title"] . "》在数据库已存在。<br/>请到“修改书单”的页面修改此书本的资料即可。");
	}

}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>青春小说</title>
		<meta charset="UTF-8">
		<link href="css/general.css" type="text/css" rel="stylesheet"/> <!-- do not change anything in this css file -->
		<link href="css/menu.css" type="text/css" rel="stylesheet"> <!-- do not change anything in this css file -->
		<link href="css/index.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>
		<?php
		require("menu.php");
		?>
		<h1>记录书籍</h1>
		
		<form method="POST" enctype="multipart/form-data">
			<input class="general" type="text" name="book_title" placeholder="书名" required/>
			<input class="general" type="text" name="author" placeholder="作者" required/>
			<input class="general" type="number" name="ISBN" placeholder="ISBN (例：9878543216111)" required/>
			<!-- there is no way to align the text in select tag to the center, possible with jQuery -->
			<!--
			<select name="size">
				<option>------开本------</option>
				<option value="16">16开</option>
				<option value="32">32开</option>
			</select>
			-->
			<input class="general" type="number" name="book_size" placeholder="开本" required/>
			<input class="general" type="number" name="quantity" placeholder="数量 (本)"required/>
			<textarea name="description" placeholder="简介" required>暂无简介</textarea>
			<input class="buttons" type="reset" value="重置">
			<input class="buttons" type="submit" value="保存">
			
		</form>
	</body>
</html>