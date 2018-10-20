
<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<style type="text/css">
	.actiondel{margin-left: 12px;}
	.actiondel a{border: 1px solid #ddd;
color: #444;
cursor: pointer;
font-size: 20px;
padding: 2px 10px;
background-color:#F0F0F0;}

</style>
<?php 

if (!isset($_GET['pageID']) || $_GET['pageID']==NULL) {
  echo "<script>  window.location='index.php'; </script>";
  // header("Location: catlist.php")
}
else 
{
 $pageID=$_GET['pageID'];


}

 ?>


  <?php 

$PrequeryFecth="SELECT * FROM page where id='$pageID' ";
$PrePageDetails=$db->select($PrequeryFecth);
if ($PrePageDetails) {
    while ($PreResultPageDetails=$PrePageDetails->fetch_assoc()) {

    	$preName=$PreResultPageDetails['name'];

    	$preBody=$PreResultPageDetails['body'];
        

}
}
 ?>



    <div class="grid_10">
	
        <div class="box round first grid">
            <h2>Add New Page</h2>

<?php 
if ($_SERVER['REQUEST_METHOD']=='POST'){
     $name=mysqli_real_escape_string($db->link,$_POST['name']);
     
     $body=mysqli_real_escape_string($db->link,$_POST['body']);
   



if ($name==$preName && $body==$preBody) {
	echo " <span class='error'> Same As Previous </span>";
	
}
if ($name=="" && $body=="" ) 
      {
         echo " <span class='error'> Field Must not be Empty </span>";
      }

      else 
      {

          
            $query="UPDATE  page 
            	SET name='$name',
            		body='$body'
            		where id='$pageID'";
            $updatePage=$db->update($query);
            if ($updatePage) 
            {
                 echo " <span class='success'>Page Updated Successfully </span>";
            }
            else
            {
                 echo " <span class='error'>Failed To Update Page </span>";
            }


      }




}


 ?>


            <div class="block"> 

             <?php 
$queryFecth="SELECT * FROM page where id='$pageID' ";
$PageDetails=$db->select($queryFecth);
if ($PageDetails) {
    while ($ResultPageDetails=$PageDetails->fetch_assoc()) {
        


 ?>

             <form action="" method="post">
                <table class="form">
                   
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="name" value="<?php echo $ResultPageDetails['name']; ?>" class="medium" />
                        </td>
                    </tr>
                 
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea name="body"  class="tinymce"><?php echo $ResultPageDetails['body']; ?></textarea>
                        </td>
                    </tr>
           <tr>
                        <td></td>
                        <td>
                            <input  type="submit" name="submit" Value="Update" />
                            <span class="actiondel"><a onclick="return confirm('Are You Sure to Delete the Page ?');"href="delPage.php?delPageID=<?php   echo $ResultPageDetails['id']; ?>">Delete</a></span>
                        </td>
                    </tr>

                  
                </table>
                </form>
            <?php }} ?>
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
