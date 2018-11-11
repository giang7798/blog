<?php
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$postid = $_GET['id'];
        if (isset($_POST['submit'])) {
			//check captcha
			$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 
          http_build_query(array('secret' => '6LdjpHgUAAAAABal0AhztFEpiswoUT4GxSJAcKFk', 'response' => $_POST['g-recaptcha-response'])));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close ($ch);
			$response = json_decode($server_output);
			if ($response->success) {
				//nếu submit rồi thì lấy các thông tin đã nhập
				$name = $_POST['author'];
				$email = $_POST['email'];
				$website = $_POST['url'];
				$comment = $_POST['comment'];
				$date = date('d,m,Y - H:i');
				if (!$name || !$email || !$comment) {
					echo 'Bạn nhập thiếu thông tin!';
				} else {

					//nếu đã đầy đủ thông tin cần thiết, tiến hành chèn vào CSDL
					$sql = 'Insert into comment(post_id,name, email, website, comment,day) values("'.$postid.'","'.$name.'","'.$email.'","'.$website.'","'.$comment.'","'.$date.'")';
					//thực thi câu lệnh SQL
					if (mysqli_query($conn, $sql)) {  //biến $conn được khai báo trong file connectdb
						echo 'Đăng bài thành công!';
					}
				}
			}
		}
	?>
								<script src="ckeditor/ckeditor.js"></script>
								<script src='https://www.google.com/recaptcha/api.js'></script>
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
										<div class="g-recaptcha" data-sitekey="6LdjpHgUAAAAADKKADWEB3T_B7kMOqTM5MYzOo8N"></div>
										<div class="col_full nobottommargin">
											<button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin">Submit Comment</button>
										</div>

									</form>
									<script>
									CKEDITOR.replace('comment');
									</script>

								</div>