<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/Format.php'; ?>
 <?php 
 $db= new Database();
 $fm= new Format();
  
 ?>

<!DOCTYPE html>
<html>
<head>
	<!-- For Title -->
	<?php 

if (isset($_GET['pageID'])) {
	$pageTitleID=$_GET['pageID'];
	$queryFecth2="SELECT * FROM page WHERE id='$pageTitleID'";
   $PageName2=$db->select($queryFecth2);
  if ($PageName2) {
    while ($ResultPageName2=$PageName2->fetch_assoc()) {
	?>
	<title><?php echo $ResultPageName2['name']; ?> - <?php  echo TITLE; ?></title>
	<?php 	
	}}}  

if (isset($_GET['id'])) {
	$PostTitleID=$_GET['id'];
	$queryFecth3="SELECT * FROM post WHERE id='$PostTitleID'";
   $PostName=$db->select($queryFecth3);
  if ($PostName) {
    while ($ResultPostName=$PostName->fetch_assoc()) {
	?>
	<title><?php echo $ResultPostName['title']; ?> - <?php  echo TITLE; ?></title>
	<?php 	
	}}}   else { ?>
		<title> <?php echo $fm->title(); ?> - <?php  echo TITLE; ?></title> 
	<?php } ?>


	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
<!-- PHP For Meta Tag -->
<?php 

if (isset($_GET['id'])) {

$keywordID=$_GET['id'];
$queryKeyword="SELECT * FROM post WHERE id='$keywordID'";
$KeywordsFetch=$db->select($queryKeyword);
if ($KeywordsFetch) {
	while ( $ResultKeyword=$KeywordsFetch->fetch_assoc()) {
		?>
		<meta name="keywords" content="<?php echo $ResultKeyword['tags']; ?>">
		
	<?php  } } } else
	{
		?>
    <meta name="keywords" content="<?php echo KEYWORDS ?>">

	<?php }?>

	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="NahidHasanLimon">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">
			<div class="logo">
				<?php 
$queryFecthTSL="SELECT * FROM titleslogan where id='1'";
$FetchTSL=$db->select($queryFecthTSL);
if ($FetchTSL) {
    while ($resultTSL=$FetchTSL->fetch_assoc()) {
        


   ?>
				<img src="admin/<?php echo $resultTSL['logo']; ?>" alt="Logo"/>
				
				<h2><?php echo $resultTSL['Title']; ?></h2>
				<p><?php echo $resultTSL['Slogan']; ?></p>
			<?php }} ?>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
				<?php 
$queryFecth="SELECT * FROM social_media where id='1'";
$SocialRow=$db->select($queryFecth);
if ($SocialRow) {
    while ($resultSocial=$SocialRow->fetch_assoc()) {
        


 ?>    
				<a href="<?php echo $resultSocial['FB'] ?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $resultSocial['Twitter'] ?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $resultSocial['LinkedIN'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $resultSocial['GPlus'] ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			<?php } } ?>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="GET">
				<input type="text" name="searchKeyword" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<?php 
$currentPage=$_SERVER['SCRIPT_FILENAME'];
$currentPage=basename($currentPage,'.php');

	 ?>
	<ul>
		<li><a <?php if ($currentPage=='index') {echo 'id="active"';} ?>
		href="index.php">Home</a></li>
	 <?php 
$queryFecth="SELECT * FROM page ";
$PageName=$db->select($queryFecth);
if ($PageName) {
    while ($ResultPageName=$PageName->fetch_assoc()) {
        


 ?>
 <!-- Highlighting Menu From DataBase -->
 <li><a

 	<?PHP 
if (isset($_GET['pageID'])&& $_GET['pageID']==$ResultPageName['id']) {
	echo 'id="active"';}
?> href="page.php?pageID=<?php echo $ResultPageName['id']; ?>">
<!-- End of Menu From DataBase  -->
<?php echo $ResultPageName['name']; ?></a> </li>   	
		
	<?php } } ?>  
	<li><a <?php  if($currentPage=='contact') {echo 'id="active"';}  ?> href="contact.php">Contact</a></li>
	</ul>
</div>