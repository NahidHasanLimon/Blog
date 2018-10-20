<?php 
// include'../lib/Session.php';
// Session::checkSession();

 ?>
 <?php 
if (!Session::get('adminRole')=='0') {
	echo "<script>  window.location='index.php'; </script>";
}
 ?>

<?php include '../config/config.php' ; ?>
<?php include '../lib/Database.php';?>

<?php 
 $db= new Database();
 ?>

 <?php 

if (!isset($_GET['delPageID']) || $_GET['delPageID']==NULL) {

echo "<script>  window.location='page.php'; </script>";

}
else 
{
	$delPageID=$_GET['delPageID'];

$DeleteQuery="DELETE FROM page where id='$delPageID'";
$deleteData=$db->delete($DeleteQuery);
if ($deleteData) {
	echo "<script>alert('Post Deleted Successfully.');</script>";
	echo "<script>window.location='index.php';</script>";
	
}
else
{
	echo "<script>alert('Failed To Delete Post.');</script>";
	echo "<script>window.location='index.php';</script>";

}
}


?>
