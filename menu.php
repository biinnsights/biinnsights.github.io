<html>
<head>
	<style type="text/css">
		
		body
{
 margin:0 auto;
 padding:0px;
 text-align:center;
 width:100%;
 font-family: "Myriad Pro","Helvetica Neue",Helvetica,Arial,Sans-Serif;
 background-color:#BDBDBD;
}
#wrapper
{
 margin:0 auto;
 padding:0px;
 text-align:center;
 width:995px;
}
#menu_div
{
 float:left;
 padding:0px;
 width:710px;
 height:50px;
 line-height:50px;
 margin-left:145px;
 position:relative;
}
#menu_div #main_menu .menu_link
{
 background-color:#2E2E2E;
 list-style-type:none;
 float:left;
 border-left:1px solid #666;
}
#menu_div #main_menu .menu_anchor
{
 color:white;
 text-decoration:none;
 padding:20px;
}
#menu_div #main_menu .menu_link:hover #submenu_div
{
 display:block;
}
#menu_div #submenu_div
{
 display:none;
 background-color:white;
 width:600px;
 position:absolute;
 left:0px;
 width:702px;
 margin:0px;
 padding:0px;
}
#menu_div #submenu_div li
{
 display:inline-block;
 margin:15px;
}
#menu_div #submenu_div li a
{
 color:blue;
 text-decoration:none;
}
#menu_div #submenu_div li a img
{
 max-height:80px;
}
	</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
function get_submenu(id)
{
$.ajax
 ({
 type:'post',
 url:'submenu.php',
 data:{
  get_submenu:"submenu",
  categoryid:id
 },
 success:function(response) {
 if(response!="")
 {
  $("#link"+id+">#submenu_div").html(response);
 }
 }
 });
}
</script>
</head>
<body>
<div id="wrapper">

<div id="menu_div">
 <?php
$con = mysqli_connect('localhost','root','','shopping');

 $menu = mysqli_query($con,"SELECT * FROM category");
 echo "<div id='main_menu'>";
 while($row=mysqli_fetch_array($menu))
 {
  ?>
  <li class='menu_link' id="link<?php echo $row['id'];?>">
  <a href='' class="menu_anchor" id="<?php echo $row['id'];?>" onmouseover="get_submenu(this.id);"><?php echo $row['categoryName'];?></a>
  <ul id='submenu_div'></ul>
  </li>
  <?php
 }
 echo "</div>";
 ?>
</div>

</div>
</body>
</html>