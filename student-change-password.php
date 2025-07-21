<?php include 'header.php'; ?>

    <!-- Body main wrapper start -->
    <main>
        <!-- Start Student Settings Dashboard Area -->
        <div class="bd-dashboard-area section-space-top section-space-bottom">
            <div class="container">
                <div class="bd-dashboard-main">
                    <div class="row gy-30">
                        <?php include 'account-dashboard.php'; ?>
                        <div class="col-xl-9 col-lg-9 col-md-8">
                            <div class="bd-dashboard-inner">
                                <div class="bd-dashboard-title-inner">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="bd-dashboard-title">Change Password</h4>
                                        <div class="dropdown filter-user">
                                            <button class="btn filter-user-btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Edit Profile
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="student-settings.php">User
                                                        Settings</a>
                                                </li>
                                                <li><a class="dropdown-item" href="student-change-password.php">Change
                                                        Password</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <form action="update-password.php" method="post" class="dashboard-profile-info">
                                    <div class="dashboard-profile-inner">
                                        <div class="row g-30">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input name="studentCurrentPassword" id="studentPassword" type="password" placeholder="Current Password" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input name="studentNewPassword" id="studentNewPassword" type="password" placeholder="New Password" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input name="studentConfirmPassword" id="studentConfirmPassword" type="password" placeholder="Confirm Password" required>
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

<?php include 'footer.php'; ?>