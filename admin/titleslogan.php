<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 
<style >
    .LeftSide{float: left;width: 70%}
.RightSide{float: left; width: 20%}
.RightSide img{height: 160px; width: 170px;}
</style>
<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {

    $Title=$fm->validation($_POST['Title']);
 $Title=mysqli_real_escape_string($db->link,$Title);

    $Slogan=$fm->validation($_POST['Slogan']);
 $Slogan=mysqli_real_escape_string($db->link,$Slogan);
 



$permited  = array('png');
$file_name = $_FILES['logo']['name'];
$file_size = $_FILES['logo']['size'];
$file_temp = $_FILES['logo']['tmp_name'];

$div = explode('.', $file_name);
$file_ext = strtolower(end($div));
$same_image = 'logo'.'.'.$file_ext;
$uploaded_image = "upload/".$same_image;

  if ($Title=="" || $Slogan=="") 
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
         
          $updateQuery="UPDATE titleslogan SET 
            Title='$Title',
            Slogan='$Slogan',
            logo='$uploaded_image'
           WHERE id='1'";
          $UpdatedTSL=$db->update($updateQuery);
          if ($UpdatedTSL) 
          {
               echo " <span class='success'>Data Updated Successfully </span>";
          }
          else
          {
               echo " <span class='error'>Failed To Updated Data </span>";
          }

     }
   }
 else
     {

       $updateQuery="UPDATE titleslogan SET 
            Title='$Title',
            Slogan='$Slogan'
            
           WHERE id='1'";
          $UpdatedTSL=$db->update($updateQuery);
          if ($UpdatedTSL) 
          {
               echo " <span class='success'>Data Updated Successfully </span>";
          }
          else
          {
               echo " <span class='error'>Failed To Update Data </span>";
          }

     }

   }
   



}


?>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <?php 
$queryFecth="SELECT * FROM titleslogan where id='1'";
$blogTitle=$db->select($queryFecth);
if ($blogTitle) {
    while ($resultBlog=$blogTitle->fetch_assoc()) {
        


 ?>
              <div class="block sloginblock">


                <div class="LeftSide">           
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $resultBlog['Title']; ?>"  name="Title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $resultBlog['Slogan']; ?>" name="Slogan" class="medium" />
                            </td>
                        </tr>

                        <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input name="logo" type="file" />
                        </td>
                    </tr>
                    <tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    </div>
                

                    <div class="RightSide">
                        <img src="<?php echo $resultBlog['logo']; ?>" alt="logo">
                        Logo
                    </div>


                </div>

                        <?php     } }  ?> <!-- End  of While Loop -->
            </div>
        </div>
             <?php include 'inc/footer.php'; ?>