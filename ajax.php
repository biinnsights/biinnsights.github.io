<?php
include"dbconnect.php"; 
$productCompany="";
$productName="";
$category="";
$sprice="";
$eprice="";
$productCompany = isset($_REQUEST['productCompany'])?$_REQUEST['productCompany']:"";
$productName = isset($_REQUEST['productName'])?$_REQUEST['productName']:"";
$category = isset($_REQUEST['category'])?$_REQUEST['category']:"";
$sprice = isset($_REQUEST['sprice'])?$_REQUEST['sprice']:"";
$eprice = isset($_REQUEST['eprice'])?$_REQUEST['eprice']:"";

	     $query = "select * from products where productAvailability = 'In Stock'"; 
		 
		           //filter query start 
					  if(!empty($productCompany)){
						  $colordata =implode("','",$productCompany);
						  $query  .= " and productCompany in('$colordata')"; 
					  }
					  
					   if(!empty($productName)){
						  $branddata =implode("','",$productName);
						  $query  .= " and productName in('$branddata')"; 
					  }
					  
					  if(!empty($category)){
						  $sizedata =implode("','",$category);
						  $query  .= " and category in('$sizedata')"; 
					  }
					  
					  if(!empty($sprice) && !empty($eprice)){
						  $query  .= " and productPrice >='$sprice' and productPrice <='$eprice'"; 
					  }
                      
				     $rs = mysqli_query($con,$query) or die("Error : ".mysql_error());
					 
					 while($product_data = mysqli_fetch_assoc($rs)){
				  ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="block2-pic hov-img0">
                            <a href="product-detail.php?pid=<?php echo ($product_data['id']);?>">
                            <img src="admin/productimages/<?php echo ($product_data['id']);?>/<?php echo ($product_data['productImage1']);?>" alt="IMG-PRODUCT" style="height: 300px;width:250px;"></a>
                        </div>
                            
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.php?pid=<?php echo ($product_data['id']);?>"><?php echo($product_data['productName']);?></a>

                                <span class="stext-105 cl3">
                                    Rs.<?php echo ($product_data['productPrice']);?> 
                                </span>
                            </div>
								
                            </div>
                            
                        </div>
                    </div>
					 <?php  } ?>