								<?php
include 'admin/connectdb.php';
							$sql = mysqli_query($conn,'SELECT * FROM comment WHERE post_id=45');
							$total = mysqli_num_rows($sql);
echo $total;
							?>