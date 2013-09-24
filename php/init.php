<?php include 'php/database/connect.php'; ?>
<?php 
include 'php/functions/general-functions.php'; 
$currentPage = basename($_SERVER['REQUEST_URI']);
if($currentPage !== 'index.php' and $currentPage !== 'logout.php')
{
	checkLogin();
}
?>
