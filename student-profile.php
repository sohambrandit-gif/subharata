<?php include 'header.php'; if(!isset($_SESSION['login']) || $_SESSION['login']== '' ){  redir('login.php');} ?>
<?php $code=$_GET['msg'];?>
    <!-- search popup area end here  -->

    <!-- Body main wrapper start -->
    <main>
        <?php if(isset($code) && $code!=''){ ?>
        <div class="alert alert-warning"> <span class="warning">
            <?php echo $code; ?>
            </span>
        </div>
        <?php } ?>
        <!-- dashboard breadcrumb start -->
        <!-- <div class="bd-dashboard-breadcrumb section-space-small-top">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bd-dashboard-breadcrumb-wrapper p-relative">
                            <div class="bd-dashboard-breadcrumb-bg image-bg" data-background="assets/images/bg/profile-bg.webp">
                            </div>
                            <div class="bd-dashboard-profile">
                                <div class="bd-dashboard-profile-user">
                                    <div class="thumb"><img src="assets/images/avatar/avatar7.webp" alt="image"></div>
                                    <div class="content">
                                        <h3 class="name">Michael Smith</h3>
                                        <span class="designation d-block">Web App Development</span>
                                        <div class="bd-dashboard-profile-meta">
                                            <div class="enrolled-course" data-title="enrolled">
                                                <span class="icon"><i class="fa-light fa-book"></i></span> 5 Courses Enrolled
                                            </div>
                                            <div class="complete-course" data-title="completed">
                                                <span class="icon"><i class="fa-solid fa-badge-check"></i></span> 2 Courses Complete
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bd-dashboard-profile-btn">
                                    <a href="become-instructor.html" class="bd-btn btn-secondary-white">Become Instructor</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- dashboard breadcrumb end -->

        <!-- Start Profile Dashboard Area -->
        <div class="bd-dashboard-area section-space-top section-space-bottom">
            <div class="container">
                <div class="bd-dashboard-main">
                    <div class="row gy-30">
                        <?php include 'account-dashboard.php'; ?>
                        <div class="col-xl-9 col-lg-9 col-md-8">
                            <div class="bd-dashboard-inner">
                                <div class="bd-dashboard-title-inner">
                                    <h4 class="bd-dashboard-title">My Profile</h4>
                                </div>
                                <div class="bd-dashboard-profile-info table-responsive">
                                    <table class="table table-bordered table-head-bg">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 200px;">Field</th>
                                                <th style="min-width: 736.5px;">Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Registration Date</th>
                                                <td><?php echo member_details($_SESSION['login'],'timestamp'); ?></td>
                                            </tr>
                                            <tr>
                                                <th>First Name</th>
                                                <td><?php echo member_details($_SESSION['login'],'fname'); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Last Name</th>
                                                <td><?php echo member_details($_SESSION['login'],'lname'); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td><?php echo member_details($_SESSION['login'],'email'); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Phone Number</th>
                                                <td><?php echo member_details($_SESSION['login'],'phone'); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td><?php echo member_details($_SESSION['login'],'address'); ?></td>
                                            </tr>
                                            <tr>
                                                <th>City</th>
                                                <td><?php echo member_details($_SESSION['login'],'city'); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Pin Code</th>
                                                <td><?php echo member_details($_SESSION['login'],'zip'); ?></td>
                                            </tr>
                                            <tr>
                                                <th>State</th>
                                                <td><?php echo member_details($_SESSION['login'],'state'); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Country</th>
                                                <td><?php echo member_details($_SESSION['login'],'country'); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Password</th>
                                                <td><?php echo member_details($_SESSION['login'],'password'); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Profile Dashboard Area -->

    </main>

    <!-- footer area start -->
    <?php include 'footer.php'; ?>