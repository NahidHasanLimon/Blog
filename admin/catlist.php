<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 

<?php 
if (isset($_GET['delCatId'])) {
	$delCatId=$_GET['delCatId'];
	$queryDel="DELETE FROM category where cat_id='$delCatId'";

	$DelCategory=$db->delete($queryDel);
						if ($DelCategory) {
							echo "<span class='success'>Category Delete Successully!!! </span>";
						}
						else 
						{

							echo "<span class='error'> Failed To Delete Category !!! </span>";
						}

 	
 } ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$queryCat=" select * from category order by cat_id desc";
						$categoryR=$db->select($queryCat);
						if ($categoryR) {
							$i=0;
							while ($resultCat=$categoryR->fetch_assoc()) {
								$i++;
							

						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $resultCat['cat_name']; ?></td>
							<td><a href="editCat.php?cat_id=<?php echo $resultCat['cat_id'];?>">Edit</a> || <a onclick="return confirm('Are You Sure to delete ?');" href="?delCatId=<?php echo $resultCat['cat_id'];?>">Delete</a></td>
						</tr>

						<?php }	} ?>
						
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
       
