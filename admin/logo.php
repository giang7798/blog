<?php
$page_title = 'Logo web';
include "header.php";
?>
<div class="row">
    <body>
	<div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
					<tr>
						<td>Logo hiện tại</td>
						<td>Thay đổi logo</td>
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
					$sql = 'select * from logo'; // không có where vì mình cần lấy tất cả
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result)) {
						while($user = mysqli_fetch_assoc($result)) {
							echo '<tr>';
							$imgData = $user['img'];  
    						echo '<td>'."<img src=\"$imgData\" />".'</td>';					
							echo '<td><a href="/admin/editlogo.php?id='.$user['id'].'">Edit</a></td>';
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
	<?php
	include 'footer.php';
	?>