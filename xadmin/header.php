<?php include 'head.php'; ?>
<?php 
if(!isset($_SESSION['admin_login']) || $_SESSION['admin_login']==''){
	?>
<script>window.location='index.php?error'</script>
<?php 
}?>
</head>
<body>
<!-- Main Wrapper -->
<div class="main-wrapper">
<!-- Header -->
<div class="header">
  <!-- Logo -->
  <div class="header-left"> <a href="index.php" class="logo" style="color: #fff;font-size: 21px;"> <?php echo $company;?></a> <a href="index.php" class="logo logo-small" style="color: #fff;font-size: 21px;">BrandIT Consultancy</a> </div>
  <!-- /Logo -->
  <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
  <!-- Mobile Menu Toggle -->
  <a class="mobile_btn" id="mobile_btn"> <i class="fa fa-bars"></i> </a>
  <!-- /Mobile Menu Toggle -->
  <!-- Header Right Menu -->
  <ul class="nav user-menu">
    <!-- User Menu -->
    <li class="nav-item dropdown has-arrow"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="favicon/favicon-96x96.png?" width="31" alt="BrandIt Consultancy"></span> </a>
      <div class="dropdown-menu">
        <div class="user-header">
          <div class="avatar avatar-sm"> <img src="favicon/favicon-96x96.png?" alt="User Image" class="avatar-img rounded-circle"> </div>
          <div class="user-text">
            <h6><?php echo $company;?></h6>
            <p class="text-muted mb-0">Administrator</p>
          </div>
        </div>
        <a class="dropdown-item" href="logout.php">Logout</a> </div>
    </li>
    <!-- /User Menu -->
  </ul>
  <!-- /Header Right Menu -->
</div>
<!-- /Header  <li> <a href="order.php?payment=Not Paid"  ><i class="fe fe-document"></i> <span>Not Paid</span></a> </li>
           <li> <a href="order.php?payment=Paid"  ><i class="fe fe-document"></i> <span>Paid</span></a> </li> -->
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="menu-title"> <span>Main</span> </li>
        <li <?php if($page=='slider'){ ?>class="active"<?php } ?>> <a href="slider.php"><i class="fe fe-home"></i> <span>Featured</span></a> </li>
		  
		   <li class="submenu <?php if($page=='order'){ ?>active<?php } ?>"> <a href="javscript:void(0)"><i class="fe fe-document"></i> <span> Orders</span> <span class="menu-arrow"></span></a>
          <ul style="display: none;" >
           <li> <a href="order.php?type="  ><i class="fe fe-document"></i> <span>All</span></a> </li>
            <li> <a href="order.php?status=Processing"  ><i class="fe fe-document"></i> <span>Processing</span></a> </li>
            <li> <a href="order.php?status=Cancelled"  ><i class="fe fe-document"></i> <span>Cancelled</span></a> </li>
            <li> <a href="order.php?status=Delivered"  ><i class="fe fe-document"></i> <span>Delivered</span></a> </li>
            <li> <a href="order.php?payment_method=Online"  ><i class="fe fe-document"></i> <span>Prepaid</span></a> </li>
           <li> <a href="order.php?payment_method=Cash on delivery"  ><i class="fe fe-document"></i> <span>COD</span></a> </li>
         
            <li> <a href="order.php?payment=Refunded"  ><i class="fe fe-document"></i> <span>Refunded</span></a> </li>
          </ul>
        </li>
        <li <?php if($page=='manufacture'){ ?>class="active"<?php } ?>> <a href="manufacture.php" ><i class="fe fe-document"></i> <span>Manufacture</span></a> </li>
        
        
        
        <li <?php if($page=='category'){ ?>class="active"<?php } ?>> <a href="category.php" ><i class="fe fe-document"></i> <span>Category</span></a> </li>
        
        
         <li class="submenu <?php if($page=='product'){ ?>active<?php } ?>"> <a href="javscript:void(0)"><i class="fe fe-document"></i> <span> Products</span> <span class="menu-arrow"></span></a>
          <ul style="display: none;" >
                <li> <a href="product.php?cat="  ><i class="fe fe-document"></i> <span>All</span></a> </li>
            <?php  $sql12 = "SELECT * FROM category ";
				$res=mysqli_query($conn,$sql12);
				while($row=mysqli_fetch_array($res)){
				?>
            <li> <a href="product.php?cat=<?php echo $row['sl_id']; ?>"  ><i class="fe fe-document"></i> <span><?php echo $row['name']; ?></span></a> </li>
            <?php } ?>
          </ul>
        </li>
        <!-- <li <?php if($page=='certificate'){ ?>class="active"<?php } ?>> <a href="certificate.php"><i class="fe fe-document"></i> <span>Coupons</span></a> </li> -->
        <li <?php if($page=='classes'){ ?>class="active"<?php } ?>> <a href="classes.php"><i class="fe fe-document"></i> <span>Classes</span></a> </li>
        <li <?php if($page=='events'){ ?>class="active"<?php } ?>> <a href="events.php"><i class="fe fe-document"></i> <span>Events</span></a> </li>
        <!-- <li <?php if($page=='event_location'){ ?>class="active"<?php } ?>> <a href="event_location.php"><i class="fe fe-document"></i> <span>Event Location</span></a> </li> -->
        <?php ?><li class="submenu <?php if($page=='blog' || $page=='add_blog'){ ?>active<?php } ?>"> <a href="javscript:void(0)"><i class="fe fe-layout"></i> <span> Blog</span> <span class="menu-arrow"></span></a>
          <ul style="display: none;">
            <li><a href="blogs.php">All Blogs</a></li>
            <li><a href="add_blog.php">Add Blog</a></li>
          </ul>
        </li>
        
        <?php ?>
        
         
        
       <!-- <li <?php if($page=='product'){ ?>class="active"<?php } ?>> <a href="product.php" ><i class="fe fe-document"></i> <span>Product</span></a> </li> -->
       
        <li <?php if($page=='contact'){ ?>class="active"<?php } ?>> <a href="contact.php" ><i class="fe fe-document"></i> <span>Contact</span></a> </li>
        <li <?php if($page=='faq'){ ?>class="active"<?php } ?>> <a href="faq.php"><i class="fe fe-document"></i> <span>Faq</span></a> </li>
         <li <?php if($page=='testimonial'){ ?>class="active"<?php } ?>> <a href="testimonial.php"><i class="fe fe-document"></i> <span>Testimonial</span></a> </li>
       
        <li  class="submenu <?php if($page=='service'){ ?>active<?php } ?>"> <a href="javscript:void(0)"><i class="fe fe-document"></i> <span> Static Pages</span> <span class="menu-arrow"></span></a>
          <ul style="display: none;">
            <?php  $sql12 = "SELECT * FROM services";
      $res=mysqli_query($conn,$sql12);
      while($row=mysqli_fetch_array($res)){
      ?>
            <li> <a href="service.php?id=<?php echo $row['sl_id']; ?>"  ><i class="fe fe-document"></i> <span><?php echo $row['title1']; ?></span></a> </li>
            <?php } ?>
          </ul>
        </li>
        <!--<li <?php if($page=='lead' && $_GET['Influencer'] =='Users'){ ?>class="active"<?php } ?>> <a href="lead.php?Influencer=Users" ><i class="fe fe-document"></i> <span>Users</span></a> </li>  -->
        
         <?php ?><li class="submenu <?php if($page=='lead' && $_GET['type'] =='Normal'  || $page=='lead' && $_GET['type'] =='Google' || $page=='lead' && $_GET['type'] =='Phone'  ){ ?>active<?php } ?>"> <a href="javscript:void(0)"><i class="fe fe-layout"></i> <span> Users</span> <span class="menu-arrow"></span></a>
          <ul style="display: none;">
            <li><a href="lead.php?type=Normal&Influencer=Users">SignUp</a></li>
            <li><a href="lead.php?type=Google&Influencer=Users">Google</a></li>
            <li><a href="lead.php?type=Phone&Influencer=Users">Phone</a></li>
          </ul>
        </li>
        
        <?php ?>
        <!-- <li <?php if($page=='lead' && $_GET['Influencer'] =='Influencer' ){ ?>class="active"<?php } ?>> <a href="lead.php?Influencer=Influencer" ><i class="fe fe-document"></i> <span>Influencer</span></a> </li> -->
      </ul>
    </div>
  </div>
</div>
<!-- /Sidebar -->
