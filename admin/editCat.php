<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 

<?php 

if (!isset($_GET['cat_id']) || $_GET['cat_id']==NULL) {
  echo "<script>  window.location='catlist.php'; </script>";
  // header("Location: catlist.php")
}
else 
{
 $cat_id=$_GET['cat_id'];


}

 ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
<?php 

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $catName=$_POST['catName'];
   $catName=mysqli_real_escape_string($db->link,$catName);
   if (empty($catName)) {
       echo "<span class='error'> Field Must Not Be Empty !!! </span>";
   }
   else  {
      $query="UPDATE  category 
                  SET cat_name='$catName'
                  WHERE cat_id='$cat_id'";
      $catUpdate=$db->update($query);
      if ($catUpdate) {
           echo "<span class='success'> Successfull!! Category Updated on the List </span>";
           echo "<script>  window.location='catlist.php'; </script>";
      }
      else 
      {
         echo "<span class='error'> Failed !! Category not Updated!! </span>";

      }
   }
}


 ?>




<?php 

            $queryCat=" SELECT * FROM category WHERE cat_id='$cat_id' ";
            $categoryR=$db->select($queryCat);
            if ($categoryR) {
              $i=0;
              while ($resultCat=$categoryR->fetch_assoc()) {
                $i++;
              

             ?>



                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" value="<?php echo $resultCat['cat_name']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                  <?php } }?>
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php'; ?>

