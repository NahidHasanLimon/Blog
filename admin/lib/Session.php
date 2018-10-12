<?php
class Session{
	 public static function init(){
	 	session_start();
	 }
	 
	 public static function set($key, $val){
	 	$_SESSION[$key] = $val;
	 }

	 public static function get($key){
	 	if (isset($_SESSION[$key])) {
	 		return $_SESSION[$key];
	 	} else {
	 		return false;
	 	}
	 }

	 public static function checkAdminSession(){
	 	self::init();
	 	if (self::get("adminLogin") == false) {
	 		self::destroy();
	 		header("Location:login.php");
	 	}
	 }
	 public static function checkAdminLogin(){
		 	self::init();
		 	if (self::get("adminLogin") == true) {
		 		header("Location:index.php");
		 	}
		 }
	 public static function checkSession(){
	 	//self::init();
	 	if (self::get("login") == false) {
	 		self::destroy();
	 		header("Location:index.php");
	 	}
	 }

	 public static function checkLogin(){
	 	
	 	if (self::get("login") == true) {
	 		header("Location:index.php");
	 	}
	 }
	  public static function checkLogin_modelTest(){
	 	
	 	if (self::get("login") == false) {
	 		header("Location:login.php");
	 	}
	 }
	  public static function checkExam(){
	 	
	 	
	 	if (self::get("Exam") == false) {
	 		//self::destroy();
	 		header("Location:exam.php");
	 	}
	 }
	 public static function checkExam_Process(){
	 	
	 	
	 	if (self::get("exam_process") == false) {
	 		//self::destroy();
	 		header("Location:model_class.php");
	 	}
	 }


	 public static function destroy(){
	 	session_destroy();
	 	session_unset();
	 	    
	 }
	  public static function unsetUser(){
	  set("login",false);
	  unset($_SESSION['userid']);
	  unset($_SESSION['username']);
	  unset($_SESSION['name']);
	  unset($_SESSION['email']);

	 
	 }
	  public static function ExamProcessFunction(){
	  set("ExamProcess",false);
	 }



	 
}

?>