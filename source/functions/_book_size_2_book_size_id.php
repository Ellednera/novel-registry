<?php
function _book_size_2_book_size_id($actual_book_size){
	if($actual_book_size == 16){
		$book_size_id = 1;
	}elseif($actual_book_size == 32){
		$book_size_id = 2;
	}else{
		$book_size_id = 3;
	}
	return $book_size_id;
}
?>