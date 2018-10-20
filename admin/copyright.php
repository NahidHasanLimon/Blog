<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 



<?php 
$PrequeryFecth="SELECT * FROM copyright where id='1'";
$PreCopyRight=$db->select($PrequeryFecth);
if ($PreCopyRight) {
    while ($Pre_ResultCopyRight=$PreCopyRight->fetch_assoc()) {
        $preiviousCopyright=$Pre_ResultCopyRight['copyright'];
        
}

}

 ?>
    <div class="grid_10">
    
        <div class="box round first grid">
            <h2>Update Copyright Text</h2>

            <?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {

$copyright=$fm->validation($_POST['copyright']);
   
 $copyright=mysqli_real_escape_string($db->link,$copyright);


  if ($copyright=="") 
  {
     echo " <span class='error'> Field Must not be Empty </span>";
  }
  else if ($copyright==$preiviousCopyright) 
  {
    echo " <span class='error'> You Keep Same Text. ..!! Give Some New!! </span>";
  }
  else
  {
 $updateQuery="UPDATE copyright SET copyright='$copyright'
           WHERE id='1'";
          $UpdateCopyright=$db->update($updateQuery);
          if ($UpdateCopyright) 
          {
               echo " <span class='success'>Copyright Text   Updated Successfully </span>";
          }
          else
          {
               echo " <span class='error'>Failed To Updated Copyright Text</span>";
          }


}
}
 ?>


            <div class="block copyblock"> 
                <?php 
$queryFecth="SELECT * FROM copyright where id='1'";
$CopyRight=$db->select($queryFecth);
if ($CopyRight) {
    while ($ResultCopyRight=$CopyRight->fetch_assoc()) {
        


 ?>
             <form action="" method="post">
                <table class="form">                    
                    <tr>
                        <td>
                            <input type="text" value="<?php echo $ResultCopyRight['copyright']; ?>" name="copyright" class="large" />
                        </td>
                    </tr>
                    
                     <tr> 
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
                    </tr>
                </table>
                </form>
            <?php }} ?>
            </div>
        </div>
    </div>
        <?php include 'inc/footer.php'; ?>

