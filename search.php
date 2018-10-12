
<?php include 'inc/header.php'; ?>

<?php 
if (!isset($_GET['searchKeyword'])||$_GET['searchKeyword']==null) {
	header("Location: 404.php");
}
else {
	$searchKeyword=$_GET['searchKeyword'];

	
}

 ?>
 
	<div class="contentsection contemplete clear">
	<div class="maincontent clear">
		<?php 
			$sqlSearch="SELECT * FROM post WHERE title LIKE '%$searchKeyword%' OR body LIKE '%$searchKeyword%' OR tags LIKE '%$searchKeyword%' OR author LIKE '%$searchKeyword%'";
			$searchR=$db->select($sqlSearch);
			if ($searchR) {
				while ($result=$searchR->fetch_assoc()) {
								
									
			 ?>

			<div class="samepost clear">
			<!-- 	Post Title -->
				<h2><a href="post.php?id=<?php echo $result['id']; ?>"> </a><?php echo $result['title']; ?></h2>
				<!-- 	Post Date -->
				<h4><?php echo $fm->formatdate($result['date']);?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
				 <a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>
				<?php echo $fm->bodyTextShorten($result['body'],400); ?>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
				</div>
			</div>
			<?php } } else {  ?> 

				<p><h3>Your Searched keyword do not match with any post</h3></p>


				<?php } ?>
		</div>
				<?php include 'inc/sidebar.php'?>
				<?php include 'inc/footer.php'?>