<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
include 'header.php';
	?>

<main class="app-content">
	<?php
        if (isset($_POST['submit'])) {
			$time = date('d-m-Y');
            //nếu submit rồi thì lấy các thông tin đã nhập
			$content = $_POST['content'];
			$user = $_SESSION['id'];
                //nếu đã đầy đủ thông tin cần thiết, tiến hành chèn vào CSDL
                $sql = 'Insert into pageusers(user_id, content, time) values("'.$user.'","'.$content.'","'.$time.'")';
				$sql1 = 'select * from pageusers where content="'.$content.'"';
				$result = mysqli_query($conn, $sql1);
				if (mysqli_num_rows($result)){
				}
                else if (mysqli_query($conn, $sql)) {  //biến $conn được khai báo trong file connectdb
                    echo 'Đăng bài thành công!';
                }
				}
	$sql2 = 'select * from users' ;
	$result2 = mysqli_query($conn, $sql2);
	$user = mysqli_fetch_assoc($result2);
	?>
      <div class="row user">
        <div class="col-md-12">
          <div class="profile">
            <div class="info"><img class="user-img" src="<?php echo $_SESSION['picture']; ?>">
              <h4><?php echo $_SESSION['user'];?></h4>
              <p>FrontEnd Developer</p>
            </div>
            <div class="cover-image"></div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Dòng Thời Gian</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Trạng Thái</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
			  <?php
				$sql = 'SELECT * FROM `pageusers` 
				JOIN users 
				ON users.id = pageusers.user_id order by pageusers.id DESC';
		        $result = mysqli_query($conn, $sql);
		  		if (mysqli_num_rows($result)) {
					while($user = mysqli_fetch_assoc($result)) {
			  ?>
            <div class="tab-pane active" id="user-timeline">
              <div class="timeline-post">
                <div class="post-media"><a href="#"><img width="50px" src="<?php echo $user['picture'];?>"></a>
                  <div class="content">
                    <h5><a href="#"><?php echo $user['username'];?></a></h5>
                    <p class="text-muted"><small><?php echo $user['time'];?></small></p>
                  </div>
                </div>
                <div class="post-content">
                  <p><?php echo $user['content']; ?></p>
                </div>
                <ul class="post-utility">
                  <li class="fa fa-cog"><a href="#"><i aria-hidden="true"></i>Edit</a></li>
                </ul>
              </div>
            </div>
			  <?php
					}
				}
						?>
            <div class="tab-pane fade" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Trạng Thái</h4>
				  <script src="ckeditor/ckeditor.js"></script>
                <form action="" method="post">
                  <div class="row">
					  <label class="control-label"></label>
					  <textarea class="form-control" rows="4" placeholder="Enter your content" name="content"></textarea>
				  </div>
                  </div>
                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                    </div>
                  </div>
                </form>
					<script>
					CKEDITOR.replace('content');
					</script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php
include 'footer.php';
?>