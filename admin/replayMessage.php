<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 
    <div class="grid_10">
	
        <div class="box round first grid">
            <h2>View Message</h2>

<?php 
if (!isset($_GET['ReplayMessageID']) || $_GET['ReplayMessageID']==NULL) {
  echo "<script>  window.location='inbox.php'; </script>";
  // header("Location: catlist.php")
}
else 
{

 $viewMessageID=$_GET['ReplayMessageID'];


}
  
 ?>
<!-- After Clicking Ok Button it will update its seen Status -->
<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
     $toEmail=$fm->validation($_POST['toEmail']);
     $fromEmail=$fm->validation($_POST['fromEmail']);
     $body=$fm->validation($_POST['body']);
     $subject=$fm->validation($_POST['subject']);
     $sendMail=mail($toEmail,$subject,$body,$fromEmail);

     if ($sendMail) {
        echo " <span class='success'>E-Mail Sent  Successfully </span>";
     }
     else
     {
         echo " <span class='error'>Failed To Send Email!! </span>";
     }
    
     
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
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text"  value="<?php echo $resultMessage['firstName']; ?>"  class="medium" />
                        </td>
                    </tr>
                     <tr>
                       

                     <tr>
                        <td>
                            <label>To</label>
                        </td>
                        <td>
                            <input type="text" readonly="" name="toEmail" value="<?php echo $resultMessage['email']; ?>"  class="medium" />
                        </td>
                    </tr>

                     <tr>
                        <td>
                            <label>From</label>
                        </td>
                        <td>
                            <input type="text" name="fromEmail" placeholder="Please enter your email address"  class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Subject</label>
                        </td>
                        <td>
                             <input type="text" name="subject" placeholder="Please enter Subject"  class="medium" />
                        </td>
                    </tr>

                 
                    <tr>
                        <td>
                            <label>Message</label>
                        </td>
                        <td>
                            <textarea  name="body" class="tinymce"> >
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
