
<?php
$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'../../lib/Session.php');
	include_once ($filepath.'../../lib/Database.php');
	include_once ($filepath.'/../../config/config.php');
	 // include '../../config/config.php' ;
	include_once ($filepath.'/../../helpers/Format.php');
	 $db= new Database();
      $fm= new Format();

	
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];

$email=mysqli_real_escape_string($db->link,$_POST['email']);
$password=mysqli_real_escape_string($db->link,$_POST['password']);
$password= $fm->validation($password);
  $email= $fm->validation($email);

          if($email =="" || $password == "") {
        //echo "<span class='error'> Filled Must Not be Empty</span>";
            echo "empty";
            exit();
      }


     else
     {       
     	
            $loginQuery="SELECT * FROM admin WHERE email='$email' AND password='$password' ";
             $result=$db->select($loginQuery);

             if ($result !=false) {
              $rowcount=mysqli_num_rows($result);
               $login_value=$result->fetch_assoc();
               if($rowcount<=0){
                 //echo "Your Accound Has been Disabled...Contact With Admin.....";
                echo "disable";
                exit();
               }
           else
           {
           echo "success";
           Session::init();
           Session::set("adminLogin",true);

           Session::set("adminName",$login_value['name']);
           Session::set("AdminProfileName",$login_value['profileName']);
           Session::set("AdminEmail",$login_value['Email']);
           Session::set("adminID",$login_value['id']);
            Session::set("adminRole",$login_value['role']);
           

           }
         }
                   else {
                    echo "error";
                    exit();


                   }

             }

}


?>
