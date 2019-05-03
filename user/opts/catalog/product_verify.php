<?php
include('dbconnect.php');
session_start();

$view_query ="select * from product_details where product_status = 'not verified'";
$view = mysqli_query($conn,$view_query);




if(isset($_POST['status_code']))
{
  //echo "asd";
  $product_id = $_POST['product_id'];
  $status=$_POST['status_code'];

  $update_status = mysqli_query($conn,"UPDATE product_details SET product_status = '$status' where product_id = '$product_id'");
  header('Location: product_verify.php');


}



// if(isset($_POST['submit']))
// {
 
//   $collection=$db->add_product;

//   $add_product=array(
//           'product_name'=>$_POST['product_name'],
//           'product_sku'=>$_POST['product_sku'],
//           'product_pieces'=>$_POST['product_pieces'],
//           'product_color'=>$_POST['product_color'],
//           'product_oem'=>$_POST['product_oem'],
//           'product_model'=>$_POST['product_model'],
//           'product_location'=>$_POST['product_location'],
//           'product_design'=>$_POST['product_design'],
//           'product_material'=>$_POST['product_material'],
//           'product_series'=>$_POST['product_series'],
//           'product_dimension'=>$_POST['product_dimension'],
//           'product_note'=>$_POST['product_note'],
//           'product_part_number'=>$_POST['product_part_number'],
//           'product_part_diagram'=>$_POST['product_part_diagram'],
//           'product_part_brand'=>$_POST['product_part_brand'],
//           'product_vehicle_brand'=>$_POST['product_vehicle_brand'],
//           'product_status' => '0',
//           'product_owner' => $_SESSION['seller_email']


//   );
//   if($collection->insert($add_product))
//   {
//     echo "fsdasd";
//     header('Location: index.php');
//   }
// }




?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>








<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 <!-- include header.php -->
  <!-- Left side column. contains the logo and sidebar -->
  <!-- include header.php -->
  <?php include('header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
    <!-- body part-->
    

        <div class="col-md-12 col-xs-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#view_product" data-toggle="tab">Verified Products</a></li>
              <li><a href="#add_product" data-toggle="tab">Pending Products</a></li>
              <li><a href="#add_product" data-toggle="tab">Not Verified Products</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="view_product">



                 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="table-responsive">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>SKU</th>
                  <th>Pieces</th>
                  <th>Color</th>
                  <th>OEM</th>
                  <th>Model</th>
                  <th>Location</th>
                  <th>Design</th>
                  <th>Material</th>
                  <th>Series</th>
                  <th>Dimension</th>
                  <th>Note</th>
                  <th>Part Number</th>
                  
                  <th>Part Brand</th>
                  <th>Vechicle Brand</th>
                  <th>Status</th>
                  <th>Owner</th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php
                  while($row = mysqli_fetch_assoc($view))
                  {
                   
                    ?>
                    <form method="post">
                    <tr>
                  <td><?php echo $row['product_name'];?></td>
                  <td><?php echo $row['product_sku'];?></td>
                  <td><?php echo $row['product_pieces'];?></td>
                  <td><?php echo $row['product_color'];?></td>
                  <td><?php echo $row['product_oem'];?></td>
                  <td><?php echo $row['product_model'];?></td>
                  <td><?php echo $row['product_location'];?></td>
                  <td><?php echo $row['product_design'];?></td>
                  <td><?php echo $row['product_material'];?></td>
                  <td><?php echo $row['product_series'];?></td>
                  <td><?php echo $row['product_dimension'];?></td>
                  <td><?php echo $row['product_note'];?></td>
                  <td><?php echo $row['product_part_number'];?></td>
                  
                  <td><?php echo $row['product_part_brand'];?></td>
                  <td><?php echo $row['product_vechicle_brand'];?></td>
                  <td><select name="status_code" onchange="this.form.submit()">
                    <option>Change Status</option>
                    <option value="<?php echo "not verified";?>">not verified</option>
                    <option value="<?php echo "pending";?>">pending</option>
                    <option value="<?php echo "verified";?>">verified</option>               
                  </select></td>
                
                  <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
                  <td><?php echo $row['product_owner'];?></td>
                  
                </tr>
                </form>
                <?php
              
            }
              ?>

                 </tbody>
                <tfoot>
                <tr>
                <th>Name</th>
                  <th>SKU</th>
                  <th>Pieces</th>
                  <th>Color</th>
                  <th>OEM</th>
                  <th>Model</th>
                  <th>Location</th>
                  <th>Design</th>
                  <th>Material</th>
                  <th>Series</th>
                  <th>Dimension</th>
                  <th>Note</th>
                  <th>Part Number</th>
                  
                  <th>Part Brand</th>
                  <th>Vechicle Brand</th>
                  <th>Status</th>
                  <th>Owner</th>

                </tr>
                </tfoot>
              </table>

            </div>
          </div>
        </div>
                <!-- Post -->
                
                <!-- /.post -->

                <!-- Post -->
                
                <!-- /.post -->

                <!-- Post -->
               
                <!-- /.post -->
              </div>

              <!-- /.tab-pane -->



              
             
              <!-- /.tab-pane -->

              <div class="tab-pane" id="add_product">
               
              </div>
              <!-- /.tab-pane -->
           </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
    </section>

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- include footer.php -->
<?php include('footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>