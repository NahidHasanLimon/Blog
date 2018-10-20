<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 
<!--   Start of DELETE Query -->
            <?php 

            	if(isset($_GET['deleteMessageID'])) {
            		
            $deleteMessageID=$_GET['deleteMessageID'];

$DeleteQuery="DELETE FROM contact where id='$deleteMessageID'";
$deleteData=$db->delete($DeleteQuery);
if ($deleteData) {
	 echo "<span class='success'> Successfull!! Deleted</span>";
	echo "<script>window.location='inbox.php';</script>";
	
}
else
{
	  echo "<span class='error'> Failed !! to DELETE!! </span>";
	

}
 
					}


             ?>
           <!--   End of DELETE  Query  -->

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                
            <!--    Inbox to SEEN Query -->
            <?php 

            	if (isset($_GET['SeenID'])) {
            		$SeenID=$_GET['SeenID'];
            		 $query="UPDATE  contact 
                  SET status='1'
                  WHERE id='$SeenID'";
      $msgStatusUpdate=$db->update($query);
      if ($msgStatusUpdate) {
           echo "<span class='success'> Successfull!! Status Updated on the List </span>";
           echo "<script>  window.location='inbox.php'; </script>";
      }
      else 
      {
         echo "<span class='error'> Failed !! Message not sent to the Seen Box!! </span>";

      }
 
					}


             ?>
           <!--   End of Inbox to Seen  Query  -->

             <!--   Start Move Seen Box to  Inbox Query -->
            <?php 

            	if (isset($_GET['MoveID'])) {
            		$MoveID=$_GET['MoveID'];
            		 $query="UPDATE  contact 
                  SET status='0'
                  WHERE id='$MoveID'";
      $msgStatusUpdate=$db->update($query);
      if ($msgStatusUpdate) {
           echo "<span class='success'> Successfull!! Sent to the  Inbox </span>";
           echo "<script>  window.location='inbox.php'; </script>";
      }
      else 
      {
         echo "<span class='error'> Failed !! Message not sent to the INBOX!! </span>";

      }
 
					}


             ?>
           <!--   End of Move Seen Box to  Inbox  Query  -->

 
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 

						$queryMessage=" SELECT * FROM contact WHERE status='0'  order by date desc";
						$MessageR=$db->select($queryMessage);
						if ($MessageR) {
							$i=0;
							while ($resultMessage=$MessageR->fetch_assoc()) {
								$i++;
							

						 ?>


						
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $resultMessage['firstName'].' '.$resultMessage['lastName']; ?> </td>
							<td><?php echo $resultMessage['email']; ?> </td>
							<td><?php echo $resultMessage['body']; ?></td>
							<td><?php echo $fm->formatDate($resultMessage['date']); ?></td>
							<td>
								<a href="viewMessage.php?viewMessageID=<?php echo $resultMessage['id']; ?>">View</a> || 
								<a href="replayMessage.php?ReplayMessageID=<?php echo $resultMessage['id']; ?>">Replay</a>
								 <?php if (Session::get('adminRole')=='0') {
              
               							?>
               							||
								<a onclick="return confirm('Are You Sure to Transfer ?');"href="?SeenID=<?php echo $resultMessage['id']; ?>">Seen</a>  
							<?php } ?>
							</td>
						</tr>
						<?php }} ?>
					</tbody>
				</table>
               </div>
            </div>


 <div class="box round first grid">
                <h2>Seen Message</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 

						$queryMessage=" SELECT * FROM contact WHERE status='1'  order by date desc";
						$MessageR=$db->select($queryMessage);
						if ($MessageR) {
							$i=0;
							while ($resultMessage=$MessageR->fetch_assoc()) {
								$i++;
							

						 ?>


						
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $resultMessage['firstName'].' '.$resultMessage['lastName']; ?> </td>
							<td><?php echo $resultMessage['email']; ?> </td>
							<td><?php echo $resultMessage['body']; ?></td>
							<td><?php echo $fm->formatDate($resultMessage['date']); ?></td>
							<td>
								 <a href="viewMessage.php?viewMessageID=<?php echo $resultMessage['id']; ?>">View</a> ||<a onclick="return confirm('Are You Sure to delete ?');"  href="?deleteMessageID=<?php echo $resultMessage['id']; ?>">Delete</a> ||
								 <a onclick="return confirm('Are You Sure to Transfer ?');"href="?MoveID=<?php echo $resultMessage['id']; ?>">Move</a> 
							</td>
						</tr>
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