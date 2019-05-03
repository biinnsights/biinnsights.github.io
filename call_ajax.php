<?php
include('dbconnect.php');
$s1=$_REQUEST["n"];
$sql=mysqli_query($con,"select * from products where productName like '%".$s1."%'") or die (mysql_error());
$s="";
while($row=mysqli_fetch_array($sql))
{
    $s=$s."
    <a class='link-p-colr' href='product-detail.php?pid=".$row['id']."'>
        <div class='live-outer'>
                <div class='live-im'>
                       <img src='admin/productimages/".$row['id']."/".$row['productImage1']."'/>
                </div>
                <div class='live-product-det'>
                    <div class='live-product-name'>
                        <p>".$row['productName']."</p>
                    </div>
                    <div class='live-product-price'>
                        <div class='live-product-price-text'><p>Rs.".number_format($row['productPrice'])."</p></div>
                    </div>
                </div>
            </div>
    </a>
    "   ;
}
echo $s;
?>