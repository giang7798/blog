<?php
include 'admin/connectdb.php';
?>
<?php
$sql = 'SELECT posts.title
FROM folder
INNER JOIN posts
ON folder.folder = posts.folder
WHERE posts.folder = \'Sức Khỏe Đời Sống\'';

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
	echo '<tr>';
	echo '<td>'.$row['title'].'</td>';
	echo '</tr>';
}

?>