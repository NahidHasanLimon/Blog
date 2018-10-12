<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 
<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Post</h2>
<?php 
if (!isset($_GET['editPost_id']) || $_GET['editPost_id']==NULL) {

echo "<script>  window.location='postlist.php'; </script>";
// header("Location: catlist.php")
}
else 
{
$post_id=$_GET['editPost_id'];

}

?>

<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
 $title=mysqli_real_escape_string($db->link,$_POST['title']);
 $cat_id=mysqli_real_escape_string($db->link,$_POST['cat']);
 $body=mysqli_real_escape_string($db->link,$_POST['body']);
 $tags=mysqli_real_escape_string($db->link,$_POST['tags']);
 $author=mysqli_real_escape_string($db->link,$_POST['author']);



$permited  = array('jpg', 'jpeg', 'png', 'gif');
$file_name = $_FILES['image']['name'];
$file_size = $_FILES['image']['size'];
$file_temp = $_FILES['image']['tmp_name'];

$div = explode('.', $file_name);
$file_ext = strtolower(end($div));
$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
$uploaded_image = "upload/".$unique_image;

  if ($title=="" || $cat_id==""|| $body=="" || $tags=="" || $author=="") 
  {
     echo " <span class='error'> Field Must not be Empty </span>";
  }
  else
  {

if (!empty($file_name)) {
  
    if ($file_size>1048567) 
    {
        echo " <span class='error'> Image Size Should Be Less then 1 MB </span>";
    }

    elseif (in_array($file_ext,$permited)===false) 
    {
         echo " <span class='error'>You Can Upload Only:- </span>";
         implode(',',$permited);
    }

    else 
    {

         move_uploaded_file($file_temp, $uploaded_image);
         
          $updateQuery="UPDATE post SET 
            cat_id='$cat_id',
            title='$title',
            author='$author',
            body='$body',
            tags='$tags',
            image='$uploaded_image'
           WHERE id='$post_id' ";
          $UpdatedPost=$db->update($updateQuery);
          if ($UpdatedPost) 
          {
               echo " <span class='success'>Post Updated Successfully </span>";
          }
          else
          {
               echo " <span class='error'>Failed To Update Post </span>";
          }

     }
   }
 else
     {

       $updateQuery2="UPDATE post SET 
            cat_id='$cat_id',
            title='$title',
            author='$author',
            body='$body',
            tags='$tags'
            
           WHERE id='$post_id' ";
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

   }
   



}


?>

<?php 

$queryGetPost="SELECT * FROM post where id='$post_id' order by id desc";
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
                        <input type="text"  name="title" placeholder="Enter Post Title..." class="medium" value="<?php echo $retPostResult['title'] ?>" />
                    </td>
                </tr>
             
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                          <select id="select"  name="cat">
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
                        <label>Upload Image</label>
                    </td>
                    <td>
                      <img src=" <?php echo $retPostResult['image'] ?>" height="50px" width="100px"/>
                        <input name="image" type="file" />
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Content</label>
                    </td>
                    <td>
                        <textarea name="body"  class="tinymce">
                          <?php echo $retPostResult['body'] ?>
                        </textarea>
                    </td>
                </tr>


                <tr>
                    <td>
                        <label>Tags</label>
                    </td>
                    <td>
                        <input type="text" name="tags" placeholder="Enter Tags  ..." class="medium" value="<?php echo $retPostResult['tags'] ?>" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Author</label>
                    </td>
                    <td>
                        <input type="text" name="author" placeholder="Enter Author Name..." class="medium" value="<?php echo $retPostResult['author'] ?>"/>
                    </td>
                </tr>

			<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
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
