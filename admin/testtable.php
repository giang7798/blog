<?php
$page_title = 'bảng';
include 'header.php';
?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/main.css">	
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
			   		<?php
					$id = $_GET['id'];
					if (!$id) {
						//nếu id không tồn tại
						header('Location: listfolder.php');
					}
					$sql = 'select * from folder where id='.$id;
					$result = mysqli_query($conn, $sql);
					if (!mysqli_num_rows($result)) {
						//nếu id không tồn tại
						header('Location: listfolder.php');
					}
					$user = mysqli_fetch_array($result);
					$folder = $user['folder'];
				    echo $folder;
					?>  
				  <thead>
					<tr>
						<td>Title</td>
						<td>Xem</td>
						  
					</tr>
					<style>
						img{
							width: 100px;
						}
					</style>
                </thead>
                <tbody>
				<?php
					//lấy tất cả các user có trong bảng users
					//câu query để lấy
					$sql = 'SELECT *
							FROM folder
							INNER JOIN posts
							ON folder.folder = posts.folder
							WHERE posts.folder = \''.$folder.'\''; 
					$result1 = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result1)) {
						while($fol = mysqli_fetch_assoc($result1)) {
							echo '<tr>';
							echo '<td>'.$fol['title'].'</td>';
							echo '<td><a href="/content.php?id='.$fol['id'].'">xem</a></td>';						
							echo '</tr>';
						}
					}
				?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
<!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
</body><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>