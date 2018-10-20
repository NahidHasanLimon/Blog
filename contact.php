<?php include 'inc/header.php'; ?>
<?php 
 if ($_SERVER['REQUEST_METHOD']=='POST') {


 	$firstName=$fm->validation($_POST['firstName']);
 	$lastName=$fm->validation($_POST['lastName']);
 	$email=$fm->validation($_POST['email']);
 	$body=$fm->validation($_POST['body']);

 	

     $firstName=mysqli_real_escape_string($db->link,$_POST['firstName']);
     $lastName=mysqli_real_escape_string($db->link,$_POST['lastName']);
      $email=mysqli_real_escape_string($db->link,$_POST['email']);
       $body=mysqli_real_escape_string($db->link,$_POST['body']);
        
       $error="";
        if (empty($firstName)) {
        	$error="First Name Must Not be Empty!!";
        }
        elseif (empty($lastName)) {
        	$error="Last Name Must Not be Empty!!";
        }
       elseif (empty($email)) {
        	$error="Email Field Must Not be Empty!!!";
        }
        elseif (!filter_var($email,FILTER_VALIDATE_EMAIL) ){
        	$error= "Invalid Email Address";
        	
        }
        else if (empty($body)) {
        	$error="Body Must Not be Empty!!!!";
        }
        else
        {
        	
            $query="INSERT INTO contact(firstName,lastName,email,body ) VALUES ('$firstName','$lastName','$email','$body')  ";
            $insertPage=$db->insert($query);
            if ($insertPage) 
            {
                $msg="Successfully Message Sent.";
            }
            else
            {
                $error="Failed to Send Message!!!!";
            }
        }

}
 ?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php 
if (isset($error)) {
	echo "<span style='color:red'>$error</span>";
}
if (isset($msg)) {
	echo "<span style='color:green'>$msg</span>";
}
				 ?>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>

					<input type="text" name="firstName" placeholder="Enter first name" />
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastName" placeholder="Enter Last name" />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="text" name="email" placeholder="Enter Email Address" />
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Send"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
		<?php include 'inc/sidebar.php'?>
		<?php include 'inc/footer.php'?>
	

	