<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 

<?php 
if (isset($_GET['delUserId'])) {
	$delUserId=$_GET['delUserId'];
	$queryDel="DELETE FROM user where userID='$delUserId'";

	$DelUser=$db->delete($queryDel);
						if ($DelUser) {
							echo "<span class='success'>User Delete Successully!!! </span>";
						}
						else 
						{

							echo "<span class='error'> Failed To Delete User !!! </span>";
						}

 	
 } ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>User List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Profile Name</th>
						
							<th>Details</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$queryUser=" SELECT * from user";
						$UserR=$db->select($queryUser);
						if ($UserR) {
							$i=0;
							while ($resultUser=$UserR->fetch_assoc()) {
								$i++;
							

						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $resultUser['name']; ?></td>
							<td><?php echo $resultUser['email']; ?></td>
							<td><?php echo $resultUser['profileName']; ?></td>

							<td><?php echo $resultUser['userReview']; ?></td>

							<td><a href="viewUser.php?user_id=<?php echo $resultUser['userID'];?>">View</a> 
								<?php if (Session::get('adminRole')=='0') {
              
               							?>

								||<a href="editUser.php?userEdit_id=<?php echo $resultUser['userID'];?>">Edit</a> || <a onclick="return confirm('Are You Sure to delete ?');" href="?delUserId=<?php echo $resultUser['userID'];?>">Delete</a></td>
							<?php } ?>
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
       
