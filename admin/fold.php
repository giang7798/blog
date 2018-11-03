<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/main.css">	
<div class="row">
    <body>
	<div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
					<tr>
						<td>STT</td>
						<td>Folder</td>
						<td>Sửa</td>
						<td>Xóa</td>
						<td>Ẩn</td>
						<td>Hiện</td>
						<td>Trạng Thái</td>
					</tr>
                </thead>
                <tbody>
                 <?php
					//lấy tất cả các user có trong bảng users
					//câu query để lấy
					$sql = 'select * from folder'; // không có where vì mình cần lấy tất cả
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result)) {
						$i = 1;
						while($fol = mysqli_fetch_assoc($result)) {
							echo '<tr>';
							echo '<td>'.($i++).'</td>';
							echo '<td>'.$fol['folder'].'</td>';									
							echo '<td><a href="/admin/editfolder.php?id='.$fol['id'].'">Edit</a></td>';
                            echo '<td><a href="/admin/deletefolder.php?id='.$fol['id'].'">Delete</a></td>';
							echo '<td><a href="/admin/hiddenp.php?id='.$fol['id'].'">Ẩn</a></td>';
							echo '<td><a href="/admin/appearp.php?id='.$fol['id'].'">Hiện</a></td>';
							if($fol['hidden']==0){echo '<td>'.'Ẩn'.'</td>';}else{echo '<td>'.'Hiện'.'</td>';}
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