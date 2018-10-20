<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 
    <div class="grid_10">
	
        <div class="box round first grid">
            <h2>View Message</h2>

<?php 
if (!isset($_GET['viewMessageID']) || $_GET['viewMessageID']==NULL) {
  echo "<script>  window.location='inbox.php'; </script>";
  // header("Location: catlist.php")
}
else 
{

 $viewMessageID=$_GET['viewMessageID'];


}
  
 ?>
<!-- After Clicking Ok Button it will update its seen Status -->
<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
     
      echo "<script>  window.location='inbox.php'; </script>";

}
 ?>

            <div class="block">               
             <form action="" method="post">
              <?php 

            $queryMessage=" SELECT * FROM contact WHERE id='$viewMessageID'";
            $MessageR=$db->select($queryMessage);
            if ($MessageR) {
              $i=0;
              while ($resultMessage=$MessageR->fetch_assoc()) {
                $i++;
              

             ?>



                <table class="form">
                   
                    <tr>
                        <td>
                            <label>First Name</label>
                        </td>
                        <td>
                            <input type="text" readonly="" value="<?php echo $resultMessage['firstName']; ?>"  class="medium" />
                        </td>
                    </tr>
                     <tr>
                        <td>
                            <label>Last Name</label>
                        </td>
                        <td>
                            <input type="text" readonly="" value="<?php echo $resultMessage['lastName']; ?>"  class="medium" />
                        </td>
                    </tr>


                     <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" readonly="" value="<?php echo $resultMessage['email']; ?>"  class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Date</label>
                        </td>
                        <td>
                            <input type="text" readonly="" value="<?php echo $fm->formatDate($resultMessage['date']); ?>" class="medium" />
                        </td>
                    </tr>

                 
                    <tr>
                        <td>
                            <label>Message</label>
                        </td>
                        <td>
                            <textarea  readonly="" >
                              <?php echo $resultMessage['body']; ?>
                            </textarea>
                        </td>
                    </tr>
           <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="OK" />
                        </td>
                    </tr>

                  
                </table>
              <?php }} ?>
                </form>
            </div>
        </div>
    </div>

     <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<?php include 'inc/footer.php'; ?>
