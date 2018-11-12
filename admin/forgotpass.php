<?php
include('connectdb.php');
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>forgotpassword - Vali Admin</title>
  </head>
  <body>
	<?php
		
        if (isset($_POST['submit'])) {
			$a = 1;

    function createRandomPassword() {

        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;

        while ($i <= 7) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }

        return $pass;

    }

    // Usage
   $password = createRandomPassword();
            //nếu submit rồi thì lấy các thông tin đã nhập
            $email = $_POST['email'];
			$result = mysqli_query($conn, 'select id from users where email= "'.$email.'"');
				if(mysqli_num_rows($result)<1){
					echo 'tài khoản mail không tồn tại mời bạn đăng kí tài khoản mới';
				}else{
				while($i = mysqli_fetch_assoc($result)){
					$id = $i['id'];				
				}
					$pa = md5($password);
                //thực thi câu lệnh SQL
				$result = mysqli_query($conn, "update users set password='$pa' where id= $id");
			if ($result) {
				echo 'đổi pass thành công xem lại email.';
				$result = mysqli_query($conn, 'select id from forgotpass where email= "'.$email.'"');
					if(mysqli_num_rows($result)<1){	
					mysqli_query($conn,'insert into forgotpass(email, password)values("'.$email.'","'.$password.'")');
					}else{
					mysqli_query($conn,"update forgotpass set password='$password' where email = '$email'");
					}
			
		}
		}
		}
        ?>
	<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Lấy Lại Mật Khẩu</h3>
            <div class="tile-body">
              <form>
				<div class="form-group">
                  <label class="control-label">Email</label>
                  <input class="form-control" type="email" placeholder="Enter email address" value="" name="email">
                </div>
              </form>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;
		<a class="btn btn-secondary" href="login.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Quay Lại</a>
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