<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 
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
      $query="INSERT  INTO category (cat_name) VALUES ('$catName') ";
      $catInsert=$db->INSERT($query);
      if ($catInsert) {
           echo "<span class='success'> Successfull!! Category Added on the List </span>";
      }
      else 
      {
         echo "<span class='error'> Failed !! Category not Inserted!! </span>";

      }
   }
}


 ?>


                 <form action="addcat.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php'; ?>

