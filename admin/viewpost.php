<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 
<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Post</h2>
<?php 
if (!isset($_GET['viewPost_id']) || $_GET['viewPost_id']==NULL) {

echo "<script>  window.location='postlist.php'; </script>";
// header("Location: catlist.php")
}
else 
{
$viewPost_id=$_GET['viewPost_id'];

}

?>

<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
 echo "<script>  window.location='postlist.php'; </script>";

}
?>

<?php 

$queryGetPost="SELECT * FROM post where id='$viewPost_id' order by id desc";
$getPost=$db->select($queryGetPost);
if ($getPost) {
while ($retPostResult=$getPost->fetch_assoc()) {

 




?>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text"readonly=""  name="title" placeholder="Enter Post Title..." class="medium" value="<?php echo $retPostResult['title'] ?>" />
                    </td>
                </tr>
             
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                          <select readonly="" id="select"  name="cat">
                            <option> Select Category</option>
                            <?php 
                            $sqlSelectCat="SELECT * from category";
                            $Category=$db->select($sqlSelectCat);
                            if ($Category) {
                                while ($resultCat=$Category->fetch_assoc()) { ?>
                            <option


                            <?php 
                            //Condition Checked for Selected Items
                            if ($retPostResult['cat_id']==$resultCat['cat_id'])  { ?>
                              selected="selected"
                             
                            <?php } ?>

                             value="<?php echo $resultCat['cat_id'] ?>"><?php echo $resultCat['cat_name'] ?></option>
                            

                          

                            <?php }} ?>
                           
                            
                        </select>
                    </td>
                </tr>
           
              
                <tr>
                    <td>
                        <label> Image</label>
                    </td>
                    <td>
                      <img src=" <?php echo $retPostResult['image'] ?>" height="100px" width="200px"/>
                       
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Content</label>
                    </td>
                    <td>
                        <textarea name="body" readonly="" class="tinymce">
                          <?php echo $retPostResult['body'] ?>
                        </textarea>
                    </td>
                </tr>


                <tr>
                    <td>
                        <label>Tags</label>
                    </td>
                    <td>
                        <input type="text" readonly="" name="tags" placeholder="Enter Tags  ..." class="medium" value="<?php echo $retPostResult['tags'] ?>" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Author</label>
                    </td>
                    <td>
                        <input type="text" readonly="" name="author" placeholder="Enter Author Name..." class="medium" value="<?php echo $retPostResult['author'] ?>"/>
                        <input type="hidden"  name="userID" value="<?php echo Session::get('adminID'); ?>"  class="medium" />
                    </td>
                </tr>

			<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Back to Post List" />
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