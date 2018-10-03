
<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?> 
 
 <?php 
 $db= new Database();
 $fm= new Format();
  
 ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<!-- Start Of Pagination -->
			<?php 
			$per_page=3;
			if (isset($_GET["page"])) {
				$page=$_GET["page"];
			}
			else
			{
				$page=1;
			}
			$start_from= ($page-1)*$per_page;



			 ?>
			<!-- End of Pagination -->

			<!-- Start Publish Post -->
			<?php 
			$sql="SELECT * from post limit $start_from,$per_page";
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
			<?php }	 ?>  <!-- end of While Loop -->

			<!-- Start of Pagination -->

<?php 
$sql="select * from post";
$result=$db->select($sql);
$total_rows=mysqli_num_rows($result);
$total_pages=ceil($total_rows/$per_page);

 ?>

			<?php echo "<span class='pagination'><a href='index.php?page=1'>".'First Page'."</a>" ;
			

			for ($i=1; $i <$total_pages ; $i++) { 
				echo "<a href='index.php?page=".$i."'>".$i."</a>";
				
			}

			 echo "<a href='index.php?page=$total_pages'>".'Last Page'."</a></span>"; ?>

			<!-- End of Pagination -->

			<?php } else { header("Location:404.php"); } ?> 
			<!-- End of If Condition -->

		</div>
				<?php include 'inc/sidebar.php'?>
				<?php include 'inc/footer.php'?>
	