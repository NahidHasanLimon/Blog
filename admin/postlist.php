<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No:</th>
							<th width="15%">Post Title</th>
							<th width="5%">Category</th>
							<th width="10%">Author</th>
							<th width="25%">Description</th>
							<th width="5%">Image</th>
							<th width="10%">Tags</th>
							<th width="15%">Date</th>
							<th width="5%">Action</th>

						</tr>
					</thead>

					
					<tbody>
						<?php 
						$i=0;
					$query="SELECT post.*,category.cat_name FROM post 
					    INNER JOIN category 
					    ON post.cat_id=category.cat_id
					    ORDER By post.title DESC";
					$retPost=$db->select($query);
					if ($retPost) {
						while ($result=$retPost->fetch_assoc()) {
							$i++;
							

					 ?>


						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><a href="editpost.php?editPost_id=<?php echo $result['id']; ?>"> <?php echo $result['title']; ?></a></td>
							<td><?php echo $result['cat_name']; ?></td>
							<td><?php echo $result['author']; ?></td>
							<td><?php echo $fm->bodyTextShorten($result['body'],30); ?></td>
							<td><img src=" <?php echo $result['image']; ?>" height="40px" width="60px"/></td>
							<td><?php echo $result['tags']; ?></td>
							<td><?php echo $fm->formatdate($result['date']); ?></td>

							<td>
								<a href="viewpost.php?viewPost_id=<?php echo $result['id']; ?>">View</a>||<?php 
									 
if (Session::get('adminRole')=='0'||Session::get('adminID')==$result['userID']) {

  ?><a href="editpost.php?editPost_id=<?php echo $result['id']; ?>">Edit</a>||<a onclick="return confirm('Are You Sure to Delete ?')"href="deletePost.php?delPost_id=<?php echo $result['id']; ?>">Delete</a>
							</td>
						</tr> <?php } ?>
						<?php }} ?>
						
						
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
       <?php include 'inc/footer.php'; ?>
