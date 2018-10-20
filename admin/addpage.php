<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 
    <div class="grid_10">
	
        <div class="box round first grid">
            <h2>Add New Page</h2>

<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
     $name=mysqli_real_escape_string($db->link,$_POST['name']);
     
     $body=mysqli_real_escape_string($db->link,$_POST['body']);
   



   

    
      if ($name=="" || $body=="" ) 
      {
         echo " <span class='error'> Field Must not be Empty </span>";
      }


      else 
      {

          
            $query="INSERT INTO page(name,body) VALUES ('$name','$body')  ";
            $insertPage=$db->insert($query);
            if ($insertPage) 
            {
                 echo " <span class='success'>Page Inserted Successfully </span>";
            }
            else
            {
                 echo " <span class='error'>Failed To Create Page </span>";
            }


      }




}


 ?>


            <div class="block">               
             <form action="" method="post">
                <table class="form">
                   
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="name" placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>
                 
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea name="body" class="tinymce"></textarea>
                        </td>
                    </tr>
           <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Create" />
                        </td>
                    </tr>

                  
                </table>
                </form>
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
