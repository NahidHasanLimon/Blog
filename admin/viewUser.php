<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 
<?php 

if (!isset($_GET['user_id']) || $_GET['user_id']==NULL) {
  echo "<script>  window.location='userList.php'; </script>";
  // header("Location: catlist.php")
}
else 
{
 $user_id=$_GET['user_id'];


}

 ?>

<div class="grid_10">

    <div class="box round first grid">
        <h2>User Profile</h2>


<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
  echo "<script>  window.location='userList.php'; </script>";
 
}
  
 

?>

<?php 

$queryGetUser="SELECT * FROM user where userID='$user_id'";
$getUser=$db->select($queryGetUser);
if ($getUser) {
while ($retUserResult=$getUser->fetch_assoc()) {



?>
        <div class="block">               
         <form action="" method="post">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" readonly="" name="admin_name" placeholder="Enter Name ..." class="medium" value="<?php echo $retUserResult['name']; ?>" />
                    </td>
                </tr>

                
                 <tr>
                    <td>
                        <label>Profile Name</label>
                    </td>
                    <td>
                        <input type="text" readonly="" name="profileName" placeholder="Enter Profile Name ..." class="medium" value="<?php echo $retUserResult['profileName']; ?>" />
                    </td>
                </tr>

                 <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text"  readonly="" name="email" placeholder="Enter Email ..." class="medium" value="<?php echo $retUserResult['email']; ?>" />
                    </td>
                </tr>
                
                 
             
                 <tr>
                    <td>
                        <label>User Review </label>
                    </td>
                    <td>
                        <textarea readonly=""><?php echo $retUserResult['userReview'];  ?></textarea>
                    </td>
                </tr>
              
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Back to  User List" />
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
