<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
						<?php 
				$sql="SELECT * from category";
				$CategoryRet=$db->select($sql);
				if ($CategoryRet) {
				
				
			    while ($resultCat=$CategoryRet->fetch_assoc()) {
			    	
			

				 ?>
						<li><a href="catRelPost.php?category=<?php echo$resultCat['cat_id'];?>"><?php echo $resultCat['cat_name']; ?></a></li>
					<?php } }


                        else
                        {
                        	 ?>

                        	<li> No Categories Available </li>
                        <?php } ?>

					
												
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
				<?php 
			$sql="SELECT * from post limit 5";
			$postRetrieve=$db->select($sql);
			if ($postRetrieve) {
				while ($result=$postRetrieve->fetch_assoc()) {
								
									
			 ?>

				
					<div class="popular clear">
					
						<h3><a href="#"><?php echo $result['title']; ?></a></h3>
						<a href="post.php?id=<?php echo $result['id']; ?>"><img src="admin/upload/<?php echo $result['image']; ?>" alt="post image"/></a>
						<?php echo $fm->bodyTextShorten($result['body'],120); ?>
					</div>


	<?php } } else { header("Location: 404.php");} ?> 
		</div>
					
					
	
			</div>
			
		</div>