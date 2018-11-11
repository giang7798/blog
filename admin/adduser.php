<?php
$page_title = 'Thêm user';
include('header.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thêm Tài Khoản</title>
</head>

<body>
	<?php
		$a = 1;
	?>
	<?php
        //đặt đoạn mã xử lý đăng ký ở đây để tiện cho việc hiển thị thông báo sau này
        //kiểm tra người dùng đã submit form hay chưa
        if (isset($_POST['submit'])) {
            //nếu submit rồi thì lấy các thông tin đã nhập
            $username = $_POST['username'];
            $password = $_POST['password'];
			$picture = $_FILES['picture'];
			move_uploaded_file($picture['tmp_name'], "uploads/".$picture['name']);
            $email = $_POST['email'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $birthday_day = $_POST['birthday_day'];
            $birthday_month = $_POST['birthday_month'];
            $birthday_year = $_POST['birthday_year'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            //kiểm tra các thông tin đã nhập đã đầy đủ hay chưa, ở đây cần thiết phải có 4 thông tin đầu tiên
            if (!$username || !$password || !$email || !$name) {
                echo 'Bạn nhập thiếu thông tin!';
            } else {
                //nếu đã đầy đủ thông tin cần thiết, tiến hành chèn vào CSDL
                $sql = 'insert into users(username, password, picture, email, name, phone, birthday, gender, address) values ("'
                    .$username.'", "'
                    .md5($password).'", "
				     http://truonggiang.com/admin/uploads/'.$picture['name'].'", "'
                    .$email.'", "'
                    .$name.'", "'
                    .$phone.'", "'
                    .$birthday_year.'-'.$birthday_month.'-'.$birthday_day.'", "' //định dạng Y-m-d cho kiểu date
                    .$gender.'", "'
                    .$address.'")';
                //thực thi câu lệnh SQL
				$sql1 = 'select * from users where username="'.$username.'"';
				$result = mysqli_query($conn, $sql1);
				if (mysqli_num_rows($result)){
					echo 'tài khoản đã tồn tại mời bạn đăng nhập một tài khoản khác';
					$a=0;
				}
                else if (mysqli_query($conn, $sql)) {  //biến $conn được khai báo trong file connectdb
                    echo 'Đăng ký thành công!';
					$a=1;
					unset($_POST);
                }
            }
        }
        ?>
	<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Vertical Form</h3>
            <div class="tile-body">
              <form>
                <div class="form-group">
                  <label class="control-label">Username</label>
                  <input class="form-control" type="text" placeholder="Enter Username" value="<?php if($a==0){echo $_POST['username'];} ?>" name="username">
                </div>
				<div class="form-group">
                  <label class="control-label">Password</label>
                  <input class="form-control" type="password" placeholder="Enter password" name="password">
                </div>
				<div class="form-group">
                  <label class="control-label">Picture</label>
                  <input class="form-control" type="file" name="picture">
                </div>
				<div class="form-group">
                  <label class="control-label">Email</label>
                  <input class="form-control" type="email" placeholder="Enter email address" value='<?php if(isset($_POST['email']) && $_POST['email'] != NULL){ echo $_POST['email']; } ?>' name="email">
                </div>
				<div class="form-group">
                  <label class="control-label">Name</label>
                  <input class="form-control" type="text" placeholder="Enter full name" value="<?php if($a==0){echo $_POST['name'];} ?>" name="name">
                </div>
				<div class="form-group">
                  <label class="control-label">Phone</label>
                  <input class="form-control" type="text" placeholder="Enter Numberphone" value="<?php if($a==0){echo $_POST['phone'];} ?>" name="phone">
                </div> 
				<div class="form-group">
                        <label class="control-label">Birthday</label>           
						<div class="form-control">
						<select name="birthday_day" class="input-text input-select">
                            <option value="" value="<?php if($a==0){echo $_POST['birthday_day'];} ?>"hidden></option>
                            <?php
                            for($i = 1; $i < 32; $i++) {
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                        <select name="birthday_month" class="input-text input-select">
                            <option value="" value="<?php if($a==0){echo $_POST['birthday_month'];} ?>" hidden></option>
                            <?php
                            for($i = 1; $i < 13; $i++) {
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                        <select name="birthday_year" class="input-text input-select">
                            <option value="" value="<?php if($a==0){echo $_POST['birthday_year'];} ?>" hidden></option>
                            <?php
                            for($i = 1950; $i < 2015; $i++) {
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
						</div>
                    </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Gender</label>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" value="0" name="gender" <?php if($a==0){if($_POST['gender']==0){echo 'checked';}}?>>Male
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" value="1" name="gender" <?php if($a==0){if($_POST['gender']==1){echo 'checked';}}?>>Female
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Address</label>
                  <textarea class="form-control" rows="4" placeholder="Enter your address" name="address"><?php if($a==0){echo $_POST['address'];} ?></textarea>
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox">I accept the terms and conditions
                    </label>
                  </div>
                </div>
              </form>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;
			<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
          </div>
        </div>
	</div>
	</div>
	<?php
include('footer.php');
?>
</body>
</html>