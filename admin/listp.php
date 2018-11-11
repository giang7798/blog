<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/main.css">	
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
					<tr>
						<th>STT</th>
						<th>Title</th>
						<th>Photo</th>
						<th>Content</th>
						<th>Describe</th>
						<th>Keyword</th>
						<th>Thư mục</th>
						<th>Edit</th>
						<th>Delete</th>
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
					$sql = 'select * from posts order by id DESC'; // không có where vì mình cần lấy tất cả
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result)) {
						$i=1;
						while($user = mysqli_fetch_assoc($result)) {
							$ct=substr($user['content'],0,40);
							$ds=substr($user['description'],0,40);
							echo '<tr>';
							echo '<td>'.($i++).'</td>';
							echo '<td>'.$user['title'].'</td>';
							$imgData = $user['photo'];  
    						echo '<td>'."<img src=\"$imgData\" />".'</td>';
							echo '<td>'."$ct".'</td>';
							echo '<td>'.$ds.'</td>';	
							echo '<td>'.$user['keyword'].'</td>';
							echo '<td>'.$user['folder'].'</td>';	
							echo '<td><a href="/admin/editpost.php?id='.$user['id'].'">Edit</a></td>';
                            echo '<td><a href="/admin/deletepost.php?id='.$user['id'].'">Delete</a></td>';
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
</body>