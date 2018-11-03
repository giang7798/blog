	    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
					<tr>
						<td>STT</td>
						<td>Username</td>
						<td>Email</td>
						<td>Name</td>
						<td>Phone</td>
						<td>Birthday</td>
						<td>Gender</td>
						<td>Address</td>
						<td>Edit</td>
						<td>Delete</td>
					</tr>
                </thead>
                <tbody>
                 <?php
					//lấy tất cả các user có trong bảng users
					//câu query để lấy
					$sql = 'select * from users'; // không có where vì mình cần lấy tất cả
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result)) {
						$i = 1;
						while($user = mysqli_fetch_assoc($result)) {
							echo '<tr>';
							echo '<td>'.($i++).'</td>';
							echo '<td>'.$user['username'].'</td>';
							echo '<td>'.$user['email'].'</td>';
							echo '<td>'.$user['name'].'</td>';
							echo '<td>'.$user['phone'].'</td>';
							echo '<td>'.$user['birthday'].'</td>';
							echo '<td>'.$user['gender'].'</td>';
							echo '<td>'.$user['address'].'</td>';
							echo '<td><a href="/edituser.php?id='.$user['id'].'">Edit</a></td>';
                            echo '<td><a href="/admin/deleteuser.php?id='.$user['id'].'">Delete</a></td>';
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

