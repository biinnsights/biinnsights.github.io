<?php
$con = mysqli_connect('localhost','root','','shopping');

if(isset($_POST['get_submenu']))
{
 $categoryid=$_POST['categoryid'];
 $sub_menu = mysqli_query($con,"SELECT * FROM subcategory where categoryid='$categoryid'");
 $sql=mysqli_query($con,"select id,subcategory  from subcategory where categoryid='$cid'");
 while($row=mysqli_fetch_array($sub_menu))
 {
 	 
				while($row=mysqli_fetch_array($sql))
				{
    			
  echo '<li><a href="sub-category.php?scid=<?php echo $row["id"];?>'.$row['subcategory'].'<br></a></li>';
 }	
 exit();
}
}
?>