<?php include 'inc/header.php'; ?>
<?php 
if (!isset($_GET['id'])||$_GET['id']==null) {
	header("Location: 404.php");
}
else {
	$id=$_GET['id'];

	
}

 ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php 
				$sql="SELECT * from post where id='$id'";
				$PostRetrieve=$db->select($sql);
				if ($PostRetrieve) {
				
				
			    while ($result=$PostRetrieve->fetch_assoc()) {
			    	
			

				 ?>
				<h2><?php echo $result['title']; ?></h2>
				<h4><?php echo $fm->formatdate($result['date']);?>, By <?php echo $result['author']; ?></h4>
				<img src="admin/upload/<?php echo $result['image']; ?>" alt="post image"/>
				    <?php echo $result['body']; ?>



			   
				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
				<!-- 	Start Related Post PHP Block -->

					<?php 

					$catID=$result['cat_id'];
					$sqlRelatedPost="SELECT * from post where cat_id='$catID' order by rand() limit 6";
				$Related_PostRetrieve=$db->select($sqlRelatedPost);
				if ($Related_PostRetrieve) {
				
				
			    while ($RelatedPostresult=$Related_PostRetrieve->fetch_assoc()) {

					 ?>
					<a href="post.php?id=<?php echo $RelatedPostresult['id']; ?>"><img src="admin/upload/<?php echo $RelatedPostresult['image']; ?>" alt="post image"/></a>
				<?php  }} 
					else
					{
						echo "Related Post Unavilable";
					}
				 ?> <!-- Closing Related Post IF and While Condition -->
				 <!-- 	Close  Related Post PHP Block -->
					
				</div>

				<!-- Closing of First IF and While  Condition  -->
				<?php
				 } }
				else
				{
					header("Location: 404.php"); 

				}
				?>
	</div>

		</div>
		
	<?php include 'inc/sidebar.php'?>
	<?php include 'inc/footer.php'?>