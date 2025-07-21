                        <div class="col-xl-3 col-lg-3 col-md-4">
                            <div class="bd-dashboard-menu">
                                <h6 class="bd-dashboard-menu-title mt-0">Welcome, <?php echo member_details($_SESSION['login'],'fname'); ?> <?php echo member_details($_SESSION['login'],'lname'); ?></h6>
                                <ul>
                                    <li>
                                        <a href="student-dashboard.php"><span><i class="fa-light fa-gauge-high"></i></span>Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="student-profile.php"><span><i class="fa-light fa-id-badge"></i></span>My Profile</a>
                                    </li>
                                    <li>
                                        <a href="student-analytics.php"><span><i class="fa-light fa-chart-line"></i></span>Analytics</a>
                                    </li>
                                    <li>
                                        <a href="student-enrolled-courses.php"><span><i class="fa-light fa-book-reader"></i></span>Enrolled
                                            Courses</a>
                                    </li>
                                    <li>
                                        <a href="student-books.php"><span><i class="fa-light fa-book"></i></span>My Books</a>
                                    </li>
                                    <li>
                                        <a href="student-wishlist.php"><span><i class="fa-light fa-heart"></i></span>Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="student-my-quiz-attempts.php"><span><i class="fa-light fa-file-lines"></i></span>My Quiz
                                            Attempts</a>
                                    </li>
                                    <li>
                                        <a href="student-assignments.php"><span><i class="fa-light fa-tasks"></i></span>Assignments</a>
                                    </li>
                                    <li>
                                        <a href="student-reviews.php"><span><i class="fa-light fa-comment-dots"></i></span>Reviews</a>
                                    </li>
                                    <li>
                                        <a href="student-purchase-history.php"><span><i class="fa-light fa-receipt"></i></span>Purchase History</a>
                                    </li>
                                    <li>
                                        <a href="student-announcements.php"><span><i class="fa-light fa-bullhorn"></i></span>Announcement</a>
                                    </li>
                                    <li>
                                        <a href="student-certificate.php"><span><i class="fa-light fa-award"></i></span>My Achievement</a>
                                    </li>
                                </ul>
                                <h6 class="bd-dashboard-menu-title">User</h6>
                                <ul>
                                    <li>
                                        <a href="student-settings.php"><span><i class="fa-light fa-sliders"></i></span>Settings</a>
                                    </li>
                                    <li>
                                        <a href="logout.php"><span><i class="fa-light fa-sign-out-alt"></i></span>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>