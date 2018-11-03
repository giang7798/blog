<?php
        if (isset($_POST['submit'])) {
            //nếu submit rồi thì lấy các thông tin đã nhập
            $name = $_POST['author'];
			$email = $_POST['email'];
			$website = $_POST['url'];
			$comment = $_POST['comment'];
            if (!$name || !$email || !$comment) {
                echo 'Bạn nhập thiếu thông tin!';
            } else {
				
                //nếu đã đầy đủ thông tin cần thiết, tiến hành chèn vào CSDL
                $sql = 'Insert into comment(name, email, website, comment) values("'.$name.'","'.$email.'","'.$website.'","'.$comment.'")';
                //thực thi câu lệnh SQL
				if (mysqli_query($conn, $sql)) {  //biến $conn được khai báo trong file connectdb
                    echo 'Đăng bài thành công!';
                }
				}
            }
	?>
								<script src="ckeditor/ckeditor.js"></script>
								<div id="respond" class="clearfix">

									<h3>Bình Luận <span>Dưới Đây</span></h3>

									<form class="clearfix" action="" method="post" id="commentform">

										<div class="col_one_third">
											<label for="author">Name</label>
											<input type="text" name="author" id="author" value="" size="22" tabindex="1" class="sm-form-control" />
										</div>

										<div class="col_one_third">
											<label for="email">Email</label>
											<input type="text" name="email" id="email" value="" size="22" tabindex="2" class="sm-form-control" />
										</div>

										<div class="col_one_third col_last">
											<label for="url">Website</label>
											<input type="text" name="url" id="url" value="" size="22" tabindex="3" class="sm-form-control" />
										</div>

										<div class="col_full">
											<label for="comment">Comment</label>
											<textarea name="comment" cols="58" rows="7" tabindex="4" id="comment" class="sm-form-control"></textarea>
										</div>

										<div class="col_full nobottommargin">
											<button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin">Submit Comment</button>
										</div>

									</form>
									<script>
									CKEDITOR.replace('comment');
									</script>

								</div>