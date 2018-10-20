<?php 
// include'../lib/Session.php';
// Session::checkSession();

 ?>

<?php include '../config/config.php' ; ?>
<?php include '../lib/Database.php';?>

<?php 
 $db= new Database();
 ?>

 <?php 
if (!isset($_GET['delPost_id']) || $_GET['delPost_id']==NULL) {

echo "<script>  window.location='postlist.php'; </script>";

}
else 
{
$del_id=$_GET['delPost_id'];
$Query_AllPost="SELECT * from post where id='$del_id'";
$getData=$db->select($Query_AllPost);
if ($getData) {
	while ($deleteIamage=$getData->fetch_assoc()) {
		//Catch Image Path To Delete From the Folder 
		$delLink=$deleteIamage['image'];
		unlink($delLink);
	}
}

$DeleteQuery="DELETE FROM post where id='$del_id'";
$deleteData=$db->delete($DeleteQuery);
if ($deleteData) {
	echo "<script>alert('Post Deleted Successfully.');</script>";
	echo "<script>window.location='postlist.php';</script>";
	
}
else
{
	echo "<script>alert('Failed To Delete Post.');</script>";
	echo "<script>window.location='postlist.php';</script>";

}

}

?>
