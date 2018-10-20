</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	<?php 
$queryFecth="SELECT * FROM copyright where id='1'";
$CopyRight=$db->select($queryFecth);
if ($CopyRight) {
    while ($ResultCopyRight=$CopyRight->fetch_assoc()) {
        


 ?>
        <p>
         &copy; Copyright <a href="https://github.com/NahidHasanLimon/Blog">Nahid Hasan Limon</a>. <?php echo $ResultCopyRight['copyright']; ?><?php echo date('Y'); ?>
        </p>
    <?php }} ?>
	</div>
	<div class="fixedicon clear">
		<?php 
$queryFecth="SELECT * FROM social_media where id='1'";
$SocialRow=$db->select($queryFecth);
if ($SocialRow) {
    while ($resultSocial=$SocialRow->fetch_assoc()) {
        


 ?>    
		<a href="<?php echo $resultSocial['FB'] ?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $resultSocial['Twitter'] ?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $resultSocial['LinkedIN'] ?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $resultSocial['GPlus'] ?>"><img src="images/gl.png" alt="GooglePlus"/></a>
	<?php }}  ?>
	</div>



<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>