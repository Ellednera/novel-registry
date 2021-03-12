<?php
	function _get_book_list($purpose){
		// book details can only be obtained when the ISBN parameter is present
		// if not then just show the general book list
		if(isset($_GET["ISBN"])){
			// obtain book all details
			$sieze_db = mysqli_connect("localhost", "root", "", "novel");
			// set charset
			mysqli_set_charset($sieze_db, "utf8");
			$book_details_info = "SELECT `ISBN`, `book_title`, `author`, `description`, `quantity`, `book_size` 
									FROM `books` 
									LEFT JOIN `book_size`
									ON 
									books.`book_size_id` = book_size.`book_size_id`
									WHERE 
									ISBN='" . $_GET["ISBN"] . "'
									AND
									`deleted`=0;
									";
			$send_info = mysqli_query($sieze_db, $book_details_info) or die("抱歉，代码命令不清楚，无法执行任务。");
			$obtained_book_details = mysqli_fetch_all($send_info, MYSQLI_ASSOC) or $empty_book_details = true;
			mysqli_close($sieze_db);
			// echo "success";
			
			// echo "<pre>";
			// var_dump($obtained_book_details);
			// echo "</pre>";
			
			// if an empty book details is true
			// that means the user is manually keying in the ISBN code in the url
			// give a warning.
			// if the ISBN code is present through PHP code after clicking a book title
			// then nothing wrong will happen.
			if(isset($empty_book_details) && $empty_book_details=true){
?>
				<div id="empty_book_details">
				<?php
					echo "喂喂喂！请别在URL那处乱输入ISBN码。";
				?>
				</div>
			<?php
			}else{
				// check whether the user is trying to view specific book details 
				// or to edit a specific book details
				// the $obtained_book_details is necessary as it will be used in the processing of the data 
				// from the database within another function
				if($purpose == "view"){
					// echo "this is for viewing";
					require("functions/_show_book_details.php");
					_show_book_details($obtained_book_details);
				}elseif($purpose == "edit"){
					// echo "this is for editing";
					// form has not yet been added
					require("functions/_edit_book_details.php");
					_edit_book_details($obtained_book_details);
				}

			}
		}else{
			// obtain book list
			$sieze_db = mysqli_connect("localhost", "root", "", "novel");
			// set charset
			mysqli_set_charset($sieze_db, "utf8");
			$book_list_request = "SELECT `book_title`, `author`, `ISBN` FROM `books` WHERE `deleted`=0";
			$send_list = mysqli_query($sieze_db, $book_list_request) or die("抱歉，代码命令不清楚，无法执行任务。");
			$obtained_book_list = mysqli_fetch_all($send_list, MYSQLI_BOTH) or $empty_book_list = true;
			mysqli_close($sieze_db);
			
			if(isset($empty_book_list) && $empty_book_list = true){
		?>
				<div id="empty_book_list">
				<?php
					echo "亲，暂时无书籍可查询。";
				?>
				</div>
		<?php
			}else{
				// print book list
				// echo "<pre>";
				// var_dump($obtained_book_list);
				// echo "</pre>";
		?>
				<div id="book_list_general_message">
					<?php
					if($purpose == "view"){
						echo "点击书名即可查看详情。";
					}elseif($purpose == "edit"){
						echo "点击书名即可修改详情。";
					}
					?>
					
				</div>
				<!-- only book name will be to the left, the rest is to be align to the center -->
				<table id="book_list">
					<tr>
						<th>序</th>
						<th id="header_book_title">书名</th>
						<th>作者</th>
						<th id="ISBN">ISBN</th>
					</tr>
					<?php
						for($rows=0; $rows<count($obtained_book_list); $rows++){
					?>
							<tr>
								<td><?php echo ($rows + 1); ?></td>
								<td class="book_title">
									<a class="book_title" href="?ISBN=<?php echo $obtained_book_list[$rows]['ISBN']; ?>" target="_blank">
					<?php
									echo $obtained_book_list[$rows]["book_title"];
					?>
									</a>
								</td>
								<td>
					<?php
									echo $obtained_book_list[$rows]["author"];
					?>
								</td>
								<td>
					<?php
									echo $obtained_book_list[$rows]["ISBN"];
					?>
								</td>
							</tr>
					<?php
						}
					?>
					<!--
					<td>1</td>
					<td>蔷薇少女馆</td>
					<td>皆尔无小</td>
					<td>97873456777</td>
					-->
				</table>
			<?php
			}
		}
	}

			?>