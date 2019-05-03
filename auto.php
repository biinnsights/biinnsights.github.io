 <?php 
session_start();
error_reporting(0);
include('dbconnect.php');
include('header.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
    $id=intval($_GET['id']);
    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['quantity']++;
    }else{
        $sql_p="SELECT * FROM products WHERE id={$id}";
        $query_p=mysqli_query($con,$sql_p);
        if(mysqli_num_rows($query_p)!=0){
            $row_p=mysqli_fetch_array($query_p);
            $_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
            header('location:index.php');
        }else{
            $message="Product ID is invalid";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Category</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/new.css">
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>

<body class="animsition">

    <!-- Page Content -->
<section class="section-slide" style="margin-top: 120px; margin-left: 30px;">
        <div class="row">
            <div class="col-md-3">
                
                
                  <div>
                <h3>Price</h3>
                <input type="hidden" class="price1" value="0" >
                <input type="hidden" class="price2" value="10000"  >
                <p id="priceshow"></p>
                <div id="slider-range"></div>
                
                </div>
                
                <div>
                <h3>Company</h3>
                <?php 
                    $query = "select distinct(productCompany) from products where productAvailability = 'In Stock'";  
                    $rs = mysqli_query($con,$query) or die("Error : ".mysqli_error());
                    while($color_data = mysqli_fetch_assoc($rs)){
                 
                ?>
                    <a href="#" class="list-group-item"> 
                    <input type="checkbox" class="item_filter productCompany" value="<?php echo $color_data['productCompany']; ?>">
                    <p style="margin-top: -17px;margin-left: 20px;"><?php echo $color_data['productCompany']; ?></p></a>
                <?php } ?>  
                </div>
                
                
                <div>
                <h3>Name</h3>
                <?php 
                    $query = "select distinct(productName) from products where productAvailability = 'In Stock'";  
                    $rs = mysqli_query($con,$query) or die("Error : ".mysql_error());
                    while($brand_data = mysqli_fetch_assoc($rs)){
                 
                ?>
                    <a href="#" class="list-group-item"> 
                    <input type="checkbox" class="item_filter productName" value="<?php echo $brand_data['productName']; ?>" >
                    <p style="margin-top: -17px;margin-left: 20px;"><?php echo $brand_data['productName']; ?></p></a>
                <?php } ?>  
                </div>
                
                <div>
                <h3>category</h3>
                <?php 
                    $query = "select distinct(category) from products where productAvailability = 'In Stock'";  
                    $rs = mysqli_query($con,$query) or die("Error : ".mysql_error());
                    while($size_data = mysqli_fetch_assoc($rs)){
                 
                ?>
                    <a href="#" class="list-group-item"> 
                    <input type="checkbox" class="item_filter category" value="<?php echo $size_data['category']; ?>"  >
                    <p style="margin-top: -17px;margin-left: 20px;"><?php echo $size_data['category']; ?></p></a>
                <?php } ?>
                </div>
                
                
            </div>

            <div class="col-md-9">

                
                <div class="row product-data"  >

                  <?php 
                    $query = "select * from products where productAvailability = 'In Stock'"; 
                      
                     $rs = mysqli_query($con,$query) or die("Error : ".mysql_error());
                     
                     while($product_data = mysqli_fetch_assoc($rs)){
                  ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="block2-pic hov-img0">
                            <a href="product-detail.php?pid=<?php echo ($product_data['id']);?>">
                            <img src="admin/productimages/<?php echo ($product_data['id']);?>/<?php echo ($product_data['productImage1']);?>" alt="IMG-PRODUCT" style="height: 250px;width:250px;"></a>
                        </div>
                           <div class="caption">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.php?pid=<?php echo ($product_data['id']);?>"><?php echo($product_data['productName']);?></a>

                                <span class="stext-105 cl3">
                                    Rs.<?php echo ($product_data['productPrice']);?> 
                                </span>
                            </div>
                           
                        </div>
                    </div>
                     <?php  } ?>
                    
                    
                </div>

            </div>
        </div>
    </section>

    <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function(){
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>

    <script src="vendor/slick/slick.min.js"></script>
    <script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
    <script src="vendor/parallax100/parallax100.js"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
<!--===============================================================================================-->
    <script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled:true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
<!--===============================================================================================-->
    <script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/sweetalert/sweetalert.min.js"></script>
    <script>
        $('.js-addwish-b2').on('click', function(e){
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function(){
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function(){
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function(){
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        /*---------------------------------------------*/

        $('.js-addcart-detail').each(function(){
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to cart !", "success");
            });
        });
    
    </script>
<!--===============================================================================================-->
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function(){
            $(this).css('position','relative');
            $(this).css('overflow','hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function(){
                ps.update();
            })
        });
    </script>
<!--===============================================================================================-->
 <script src="js/main.js"></script>
    <script>
    var productCompany,productName,category;
    $(function(){
        $('.item_filter').click(function(){
            $('.product-data').html('<div id="loaderpro" style="" ></div>');
        
             productCompany = multiple_values('productCompany');
             productName  = multiple_values('productName');
             category   = multiple_values('category');
            
            $.ajax({
                url:"ajax.php",
                type:'post',
                data:{productCompany:productCompany,productName:productName,category:category,sprice:$(".price1" ).val(),eprice:$( ".price2" ).val()},
                success:function(result){
                    $('.product-data').html(result);
                }
            });
        });
        
    });
    
    
    function multiple_values(inputclass){
        var val = new Array();
        $("."+inputclass+":checked").each(function() {
            val.push($(this).val());
        });
        return val;
    }
    
    
  $(function() {
        $( "#slider-range" ).slider({
          range: true,
          min: 0,
          max: 10000,
          values: [ 100, 10000 ],
          slide: function( event, ui ) {
            $( "#priceshow" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            $( ".price1" ).val(ui.values[ 0 ]);
            $( ".price2" ).val(ui.values[ 1 ]);
            $('.product-data').html('<div id="loaderpro" style="" ></div>');
             productCompany = multiple_values('productCompany');
             productName  = multiple_values('productName');
             category  = multiple_values('category');
            $.ajax({
                url:"ajax.php",
                type:'post',
                data:{productCompany:productCompany,productName:productName,category:category,sprice:ui.values[ 0 ],eprice:ui.values[ 1 ]},
                success:function(result){
                    $('.product-data').html(result);
                }
            });
          }
        });
        
        $( "#priceshow" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
         " - $" + $( "#slider-range" ).slider( "values", 1 ) );
    }); 
    
</script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
