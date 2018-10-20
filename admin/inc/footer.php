<div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
    	<?php 
$queryFecth="SELECT * FROM copyright where id='1'";
$CopyRight=$db->select($queryFecth);
if ($CopyRight) {
    while ($ResultCopyRight=$CopyRight->fetch_assoc()) {
        


 ?>
        <p>
         &copy; Copyright <a href="https://github.com/NahidHasanLimon/Blog">Nahid Hasan Limon</a>. <?php echo $ResultCopyRight['copyright']; ?>
        </p>
    <?php }} ?>
    </div>
</body>
</html>
