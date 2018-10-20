<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {

    $FB=$fm->validation($_POST['FB']);
    $Twitter=$fm->validation($_POST['Twitter']);
    $LinkedIN=$fm->validation($_POST['LinkedIN']);
    $GPlus=$fm->validation($_POST['GPlus']);
 $FB=mysqli_real_escape_string($db->link,$FB);
 $Twitter=mysqli_real_escape_string($db->link,$Twitter);
 $LinkedIN=mysqli_real_escape_string($db->link,$LinkedIN);
 $GPlus=mysqli_real_escape_string($db->link,$GPlus);

  if ($FB=="" || $Twitter=="" || $LinkedIN=="" || $GPlus=="") 
  {
     echo " <span class='error'> Field Must not be Empty </span>";
  }
  else
  {
 $updateQuery="UPDATE social_media SET 
            FB='$FB',
            Twitter='$Twitter',
            LinkedIN='$LinkedIN',
            GPlus='$GPlus'
           WHERE id='1'";
          $UpdatedTSL=$db->update($updateQuery);
          if ($UpdatedTSL) 
          {
               echo " <span class='success'>Social Media  Updated Successfully </span>";
          }
          else
          {
               echo " <span class='error'>Failed To Updated Social Media Data </span>";
          }


}
}
 ?>



        <div class="grid_10">
		
            <div class="box round first grid">
               
                <h2>Update Social Media</h2>
                <div class="block">   
                <?php 
$queryFecth="SELECT * FROM social_media where id='1'";
$SocialRow=$db->select($queryFecth);
if ($SocialRow) {
    while ($resultSocial=$SocialRow->fetch_assoc()) {
        


 ?>            
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="FB" value="<?php echo $resultSocial['FB']; ?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="Twitter" value="<?php echo $resultSocial['Twitter']; ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="LinkedIN" value="<?php echo $resultSocial['LinkedIN']; ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="GPlus" value="<?php echo $resultSocial['GPlus']; ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php } } ?>

                </div>
            </div>
        </div>
       <?php include 'inc/footer.php'; ?>
