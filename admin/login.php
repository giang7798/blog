<?php
session_start();
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
    <title>Login - Vali Admin</title>
  </head>
  <body>
	  <?php
	     if(isset($_SESSION['user'])){
			 echo 'bạn đã đăng nhập';
			 header('Location: index.php');
		 }	
	?>
		<?php
        //đặt đoạn mã xử lý đăng ký ở đây để tiện cho việc hiển thị thông báo sau này
        //kiểm tra người dùng đã submit form hay chưa
        if (isset($_POST['submit'])) {
            //nếu submit rồi thì lấy các thông tin đã nhập
            $username = $_POST['username'];
            $password = $_POST['password'];
            //kiểm tra các thông tin đã nhập đã đầy đủ hay chưa
            if (!$username || !$password) {
                echo 'Bạn nhập thiếu thông tin!';
            } else if(!isset($_SESSION['user'])){
                //nếu đã đầy đủ thông tin cần thiết, tiến hành tìm kiếm người dùng trong CSDL
                $sql = 'select * from users where username="'.$username.'" and password = "'.md5($password).'"';
                //sử dụng mã hóa MD5 trước khi tìm kiếm để tăng tính bảo mật cho ứng dụng web
                //thực thi câu lệnh SQL
                $result = mysqli_query($conn, $sql); //biến $conn được khai báo trong file connectdb
                if (mysqli_num_rows($result)) {
                    echo 'Đăng nhập thành công!';
					$user = mysqli_fetch_array($result);	
			        $_SESSION['user'] = $user['username'];
					$_SESSION['id'] = $user['id'];
					header('Location:index.php');
                }else{
					echo 'sai tài khoản hoặc mật khẩu';
				}
            }
        }
        ?>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Vali</h1>
      </div>
      <div class="login-box">
        <form class="login-form" action="" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="Email" name="username" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" name="password">
		  </div>
		  <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="submit" ><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
        <form class="forget-form" action="resetpass.php">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw" type="submit" name="submit"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>