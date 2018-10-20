<?php 
include 'inc/header.php';
?>
<?php 

if (!isset($_GET['pageID']) || $_GET['pageID']==NULL) {
  // echo "<script>  window.location='index.php'; </script>";
  header("Location: 404.php");
}
else 
{
 $pageID=$_GET['pageID'];


}

 ?>
  <?php 

$queryFecth="SELECT * FROM page where id='$pageID' ";
$PageDetails=$db->select($queryFecth);
if ($PageDetails) {
    while ($ResultPageDetails=$PageDetails->fetch_assoc()) {

    	
        


 ?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $ResultPageDetails['name']; ?></h2>
				<?php echo $ResultPageDetails['body']; ?>
	</div>

		</div>
		
		<?php } } else { header("location:404.php");} ?>
	<?php include 'inc/sidebar.php'; ?>
	<?php include 'inc/footer.php'; ?>