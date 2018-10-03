
<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?> 
<?php 
if (!isset($_GET['category'])||$_GET['category']==null) {
	header("Location: 404.php");
}
else {
	$categoryID=$_GET['category'];

	
}

 ?>
 
	<div class="contentsection contemplete clear">
	<div class="maincontent clear">
		<?php 
			$sql="SELECT * from post where cat_id='$categoryID'";
			$postRetrieve=$db->select($sql);
			if ($postRetrieve) {
				while ($result=$postRetrieve->fetch_assoc()) {
								
									
			 ?>

			<div class="samepost clear">
			<!-- 	Post Title -->
				<h2><a href="post.php?id=<?php echo $result['id']; ?>"> </a><?php echo $result['title']; ?></h2>
				<!-- 	Post Date -->
				<h4><?php echo $fm->formatdate($result['date']);?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
				 <a href="#"><img src="admin/upload/<?php echo $result['image']; ?>" alt="post image"/></a>
				<?php echo $fm->bodyTextShorten($result['body'],400); ?>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
				</div>
			</div>
			<?php } } else { header("Location: 404.php");} ?> 
		</div>
				<?php include 'inc/sidebar.php'?>
				<?php include 'inc/footer.php'?>