<?php
function _edit_book_details($obtained_book_details){
?>
	<form id="edit_book_details" method="POST" enctype="multipart/form-data">
		<table class="book_details">
		<?php
			// print book details
			for($rows=0; $rows<count($obtained_book_details); $rows++){
		?>
				<tr>
					<th colspan=2>
						<input type="text" name="book_title" value="<?php echo $obtained_book_details[$rows]["book_title"]; ?>" placeholder="书名" required/>
					</th>
				</tr>
				<tr>
					<td class="descriptor">ISBN</td>
					<td>
						<input type="number" name="ISBN" value="<?php echo $obtained_book_details[$rows]["ISBN"]; ?>" placeholder="ISBN (例：9878543216111)" required/>
					</td>
				</tr>
				<tr>
					<td class="descriptor">作者</td>
					<td>
						<input type="text" name="author" value="<?php echo $obtained_book_details[$rows]["author"]; ?>" placeholder="作者" required/>
					</td>
				</tr>
				<tr>
					<td class="descriptor">开本</td>
					<td>
						<input type="number" name="book_size" value="<?php echo $obtained_book_details[$rows]["book_size"]; ?>" placeholder="开本" required/>
					</td>
				</tr>
				<tr>
					<td class="descriptor">数量(本)</td>
					<td>
						<input type="number" name="quantity" value="<?php echo $obtained_book_details[$rows]["quantity"]; ?>" placeholder="数量 (本)"required/>
					</td>
				</tr>
				<tr>
					<td class="descriptor">内容简介</td>
					<td class="book_description">
						<textarea name="description" placeholder="简介" required><?php echo strip_tags($obtained_book_details[$rows]["description"]); ?></textarea>
					</td>
				</tr>
				<tr>
					<td colspan=2>
						<input id="save_new_book_details" type="submit" value="保存"/>
					</td>
				</tr>
		<?php
			}
		?>
		</table>
	</form>
<?php
}
?>