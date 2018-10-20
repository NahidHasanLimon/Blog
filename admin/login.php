
 <?php 
// include '../lib/Session.php' ;
// Session::init();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <!-- <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" /> -->
<style type="text/css">
	
h1 {
  height: 100px;
  width: 100%;
  font-size: 18px;
  background: #18aa8d;
  color: white;
  line-height: 150%;
  border-radius: 3px 3px 0 0;
  box-shadow: 0 2px 5px 1px rgba(0, 0, 0, 0.2);
}

form {
  box-sizing: border-box;
  width: 260px;
  margin: 100px auto 0;
  box-shadow: 2px 2px 5px 1px rgba(0, 0, 0, 0.2);
  padding-bottom: 40px;
  border-radius: 3px;
}
form h1 {
  box-sizing: border-box;
  padding: 20px;
}

input {
  margin: 40px 25px;
  width: 200px;
  display: block;
  border: none;
  padding: 10px 0;
  border-bottom: solid 1px #1abc9c;
  -webkit-transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
          transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
  background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 96%, #1abc9c 4%);
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 96%, #1abc9c 4%);
  background-position: -200px 0;
  background-size: 200px 100%;
  background-repeat: no-repeat;
  color: #0e6252;
}
input:focus, input:valid {
  box-shadow: none;
  outline: none;
  background-position: 0 0;
}
input:focus::-webkit-input-placeholder, input:valid::-webkit-input-placeholder {
  color: #1abc9c;
  font-size: 11px;
  -webkit-transform: translateY(-20px);
          transform: translateY(-20px);
  visibility: visible !important;
}

button {
  border: none;
  background: #1abc9c;
  cursor: pointer;
  border-radius: 3px;
  padding: 6px;
  width: 200px;
  color: white;
  margin-left: 25px;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.2);
}
button:hover {
  -webkit-transform: translateY(-3px);
      -ms-transform: translateY(-3px);
          transform: translateY(-3px);
  box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.2);
}
 
/*The magic happens in a few lines of code for the input:focus and input:valid. The CSS transform property plays a crucial role to achieve this little instant feedback effect.*/

input:focus::-webkit-input-placeholder, input:valid::-webkit-input-placeholder {
  color: #1abc9c;
  font-size: 11px;
  -webkit-transform: translateY(-20px);
          transform: translateY(-20px);
  visibility: visible !important;
}

</style>
<script src="LoginProcessJquery/jquery.js"></script>
     <script type="text/javascript">

   $(function(){
    //for user registration

      //For User Login
      $("#login_submit").click(function(){

       var email=$("#email").val();
       var password=$("#password").val();

      //dataString is simply a variable
      var dataString ='email='+email+'&password='+password ;
      //ajax start
          $.ajax({
          //body of ajax

          type:"POST",
          url:"LoginProcessJquery/getlogin.php",
          data:dataString,
          //operation
          success: function(data){

                  if($.trim(data) == "empty") {
    //use #for id and dot(.) for class
                       $(".empty").show();

                       setTimeout(function(){

                        $(".empty").fadeOut();
                       },3000);


                  }


                  else if($.trim(data) == "error")
                  {
                    alert("Email or password do not matched");
                          $(".error").show();
                          setTimeout(function(){

                         $(".error").fadeOut();
                       },3000);


                  }
                  else 
                     {
                      alert("Succesfully Logged In ");
                      window.location="index.php";
                     }



          }




          });

                return false;

      });




    });


    </script>
</head>
			<body>
			<div class="container">
				<section id="content">
			<form action="" method="POST">
	<h1>Drimik Blog Admin Login</h1>
	<input placeholder="Username" type="text" name="email" id="email" required="">
	<input placeholder="Password" type="password" name="password" id="password" required="">
	<button name="login_submit" id="login_submit">Submit</button>
	</form ><!-- form -->
					<div class="button">
            <span class="disable"  style="display: none"><h1>Disabled Account!! Warning!!</h1></span>
              <span class="empty" style="display: none "><h1>Field Must not be Empty</h1></span>
              <span class="error"  style="display: none"><h4>Email or password  do not matched</h4></span>
						<a href="#">Drimik Blog</a>
					</div><!-- button -->
				</section><!-- content -->
			</div><!-- container -->
			</body>
			</html>