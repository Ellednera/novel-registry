<?php
function _show_book_details($obtained_book_details){
?>
	<table class="book_details">
	<?php
		// print book details
		for($rows=0; $rows<count($obtained_book_details); $rows++){
	?>
			<tr>
				<th class="book_title" colspan=2><?php echo $obtained_book_details[$rows]["book_title"]; ?></th>
			</tr>
			<tr>

				<td class="descriptor">ISBN</td>
				<td><?php echo $obtained_book_details[$rows]["ISBN"]; ?></td>
			</tr>
			<tr>
				<td class="descriptor">作者</td>
				<td><?php echo $obtained_book_details[$rows]["author"]; ?></td>
			</tr>
			<tr>
				<td class="descriptor">开本</td>
				<td><?php echo $obtained_book_details[$rows]["book_size"]; ?></td>
			</tr>
			<tr>
				<td class="descriptor">数量(本)</td>
				<td><?php echo $obtained_book_details[$rows]["quantity"]; ?></td>
			</tr>
			<tr>
				<td class="descriptor">内容简介</td>
				<td class="book_description">
				<?php echo $obtained_book_details[$rows]["description"]; ?>
				</td>
			</tr>
	<?php
		}
	?>
	</table>
<?php
}
?>