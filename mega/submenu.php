<?php
$con = mysqli_connect('localhost','root','','shopping');

if(isset($_POST['get_submenu']))
{
 $categoryid=$_POST['categoryid'];
 $sub_menu = mysqli_query($con,"SELECT * FROM subcategory where categoryid='$categoryid'");
 while($row=mysqli_fetch_array($sub_menu))
 {  
 ?>			
  <li><?php echo $row['subcategory']; ?></li>

  <?php
 }	
 exit();
}
?>