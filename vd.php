<?php
include 'admin/connectdb.php';
$id = $_GET['id'];
$current_page = isset($_GET['page']) ? $_GET['page'] : '1';
echo $current_page;
?> 
