<?php
include 'connectdb.php';
$sql = "select * from articlestags where article_id = 71";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		while($i = mysqli_fetch_assoc($result)){
			echo $i['tag_id'].'<br>';
		}
	}