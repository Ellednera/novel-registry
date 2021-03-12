<?php
function _update_book_details($details_from_POST, $current_ISBN, $book_size_id){
	
	$sieze_db = mysqli_connect("localhost", "root", "", "novel");
	// set charset
	mysqli_set_charset($sieze_db, "utf8");
	$new_book_details = "UPDATE `books`
						SET
						`ISBN`='" . $_POST["ISBN"] . "',
						`book_title`=N'" . strip_tags(addslashes($_POST["book_title"])) . "',
						`author`=N'" . strip_tags(addslashes($_POST["author"])) . "',
						`description`=N'" . nl2br(strip_tags(addslashes($_POST["description"]))) . "',
						`quantity`='" . $_POST["quantity"] . "',
						`book_size_id`='" . $book_size_id . "'
						WHERE
						`ISBN`='" . $current_ISBN . "'
						AND
						`deleted`=0;
						";
	$send_info = mysqli_query($sieze_db, $new_book_details) or $error = true;
	mysqli_close($sieze_db);
	
	// this will be used for future implementation for security checking
	// if the user messes around by changing the ISBN in the URL without pressing enter,
	// then the value of $_GET["ISBN"] will still be the same as it is in the beginning
	// So this feature might not be needed.
	// return $error;
	
}

?>