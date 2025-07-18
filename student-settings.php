
  <?php include 'header.php'; ?>
  
    <!-- Body main wrapper start -->
    <main>
        
        <!-- Start Student Settings Dashboard Area -->
        <div class="bd-dashboard-area section-space-small-top section-space-bottom">
            <div class="container">
                <div class="bd-dashboard-main">
                    <div class="row gy-30">
                     <?php include 'account-dashboard.php'; ?>

                        <div class="col-xl-9 col-lg-9 col-md-8">
                            <div class="bd-dashboard-inner">
                                <div class="bd-dashboard-title-inner">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="bd-dashboard-title">Student Settings</h4>
                                        <div class="dropdown filter-user">
                                            <button class="btn filter-user-btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Edit Profile
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="student-settings.html">User
                                                        Settings</a>
                                                </li>
                                                <li><a class="dropdown-item" href="student-change-password.html">Change
                                                        Password</a></li>
                                                <li><a class="dropdown-item" href="student-social-profile.html">Social
                                                        Profile</a></li>
                                                <li><a class="dropdown-item" href="student-upload-photo.html">Upload
                                                        Photo</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <form class="dashboard-profile-info" method="POST" action="update_profile.php">
                                    <div class="dashboard-profile-inner">
                                        <div class="row gy-30">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input name="fname" id="studentFirstName" type="text" placeholder="First Name" value="<?php echo member_details($_SESSION['login'],'fname'); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input name="lname" id="studentLastName" type="text" placeholder="Last Name" value="<?php echo member_details($_SESSION['login'],'lname'); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input name="phone" id="studentPhoneNumber" type="tel" placeholder="Phone Number" value="<?php echo member_details($_SESSION['login'],'phone'); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input name="email" id="studentGmail" type="email" placeholder="info@gmail.com" value="<?php echo member_details($_SESSION['login'],'email'); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input name="city" id="studentCity" type="text" placeholder="Kolkata" value="<?php echo member_details($_SESSION['login'],'city'); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input name="address" id="studentAddress" type="text" placeholder="Your Address" value="<?php echo member_details($_SESSION['login'],'address'); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input name="zip" id="studentZip" type="number" placeholder="Your PIN" value="<?php echo member_details($_SESSION['login'],'zip'); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input name="landmark" id="studentLandmark" type="text" placeholder="Your Landmark" value="<?php echo member_details($_SESSION['login'],'landmark'); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" class="bd-btn btn-primary">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Student Settings Dashboard Area -->

    </main>

    <!-- footer area start -->
  <?php include 'footer.php'; ?>