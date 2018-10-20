<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?> 
<?php 
if (!Session::get('adminRole')=='0') {
 echo "<script>  window.location='index.php'; </script>";
}
 ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 
<?php 

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $role=$_POST['role'];

   $name=mysqli_real_escape_string($db->link,$name);
   $email=mysqli_real_escape_string($db->link,$email);
   $password=mysqli_real_escape_string($db->link,$password); 
   $role=mysqli_real_escape_string($db->link,$role);
  
   if ($role=="1") {

    $query="INSERT  INTO admin (name,email,password) VALUES ('$name','$email','$password')";
      $userAdminInsert=$db->INSERT($query);
      if ($userAdminInsert) {
           echo "<span class='success'> User Added as an Admin Successfull!! </span>";
      }
      else 
      {
         echo "<span class='error'> Failed to ADD USER as an Admin !! </span>";

      }
    
   }
   else if ($role=="2") {

    $query="INSERT  INTO admin (name,email,password,role) VALUES ('$name','$email','$password','$role')";
      $userAdminInsert=$db->INSERT($query);
      if ($userAdminInsert) {
           echo "<span class='success'> User Added as an Author Successfull!! </span>";
      }
      else 
      {
         echo "<span class='error'> Failed to ADD USER as an Author !! </span>";

      }
    
   }
   else if ($role=="3") {

    $query="INSERT  INTO admin (name,email,password,role) VALUES ('$name','$email','$password','$role')";
      $userAdminInsert=$db->INSERT($query);
      if ($userAdminInsert) {
           echo "<span class='success'> User Added as an Editor Successfull!! </span>";
      }
      else 
      {
         echo "<span class='error'> Failed to ADD USER as an Editor !! </span>";

      }
    
   }


   else
   {
   if (empty($name)) {
       echo "<span class='error'>Name Field Must Not Be Empty !!! </span>";
   }
  else if (empty($email)) {
       echo "<span class='error'>Email Field Must Not Be Empty !!! </span>";
   }
   else if (empty($password)) {
       echo "<span class='error'>Password Field Must Not Be Empty !!! </span>";
   }
   // else if(empty($role)) {
   //     echo "<span class='error'>Role Selection  Must !!! </span>";
   // }
   else  {
      $query="INSERT  INTO user (name,email,password,role) VALUES ('$name','$email','$password','$role') ";
      $catInsert=$db->INSERT($query);
      if ($catInsert) {
           echo "<span class='success'> User Added Successfull!! </span>";
      }
      else 
      {
         echo "<span class='error'> Failed to ADD USER !! </span>";

      }
   }
}

}


 ?>


                 <form action="addUser.php" method="post">
                    <table class="form">					
                        <tr>
                          <td>
                            <label>Name</label>
                        </td>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>

                         <tr>
                          <td>
                            <label>Email</label>
                        </td>
                            <td>
                                <input type="text" name="email" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>

                         <tr>
                          <td>
                            <label>Password</label>
                        </td>
                            <td>
                                <input type="text" name="password" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>

                         <tr>
                          <td>
                            <label>Role</label>
                        </td>
                            <td>
                                <!-- <input type="text" name="role" placeholder="Enter Category Name..." class="medium" /> -->
                                <select id="select" name="role">
                                  <option>Select User Role</option>
                                  <option value="1">Admin</option>
                                  <option value="2">Author</option>
                                  <option value="3">Editor</option>
                                  <option value="0">User</option>
                                </select>
                            </td>
                        </tr>

						              <tr>
                          <td></td>
                            <td>
                                <input  type="submit" name="submit" Value="Add" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php'; ?>

