<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 

<?php 
$adminID=Session::get('adminID');
$adminRole=Session::get('adminRole');

 ?>

<div class="grid_10">

    <div class="box round first grid">
        <h2>User Profile</h2>


<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
 $name=mysqli_real_escape_string($db->link,$_POST['admin_name']);
 $profileName=mysqli_real_escape_string($db->link,$_POST['profileName']);
 $email=mysqli_real_escape_string($db->link,$_POST['email']);
 $password=mysqli_real_escape_string($db->link,$_POST['password']);

       $updateQuery2="UPDATE admin SET 
            name='$name',
            profileName='$profileName',
            email='$email',
            password='$password'
            
            
           WHERE id='$adminID' ";
          $UpdatedPost2=$db->update($updateQuery2);
          if ($UpdatedPost2) 
          {
               echo " <span class='success'>Post Updated Successfully </span>";
          }
          else
          {
               echo " <span class='error'>Failed To Update Post </span>";
          }

     }

  
 

?>

<?php 

$queryGetAdmin="SELECT * FROM admin where id='$adminID'";
$getAdmin=$db->select($queryGetAdmin);
if ($getAdmin) {
while ($retAdminResult=$getAdmin->fetch_assoc()) {



?>
        <div class="block">               
         <form action="" method="post">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text"  name="admin_name" placeholder="Enter Name ..." class="medium" value="<?php echo $retAdminResult['name']; ?>" />
                    </td>
                </tr>

                
                 <tr>
                    <td>
                        <label>Profile Name</label>
                    </td>
                    <td>
                        <input type="text"  name="profileName" placeholder="Enter Profile Name ..." class="medium" value="<?php echo $retAdminResult['profileName']; ?>" />
                    </td>
                </tr>

                 <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text"  name="email" placeholder="Enter Email ..." class="medium" value="<?php echo $retAdminResult['email']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Password</label>
                    </td>
                    <td>
                        <input type="password"  name="password" placeholder="Enter Password ..." class="medium" value="<?php echo $retAdminResult['email']; ?>" />
                    </td>
                </tr>
                 
             
                
              
              
              <!--   <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Content</label>
                    </td>
                    <td>
                        <textarea name="body"  class="tinymce">
                          <?php echo $retPostResult['body'] ?>
                        </textarea>
                    </td>
                </tr> -->


                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update Profile" />
                    </td>
                </tr>
            </table>
            </form>
          <?php } } ?>
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
