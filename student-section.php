<?php include 'header.php'; if(!isset($_SESSION['login']) || $_SESSION['login']== '' ){  redir('login.php');} ?>

    <!-- Body main wrapper start -->
    <main>

        <!-- breadcrumb area start -->
        <section class="bd-breadcrumb-area p-relative fix z-index-11">
            <div class="bd-breadcrumb-bg-two" data-background="assets/images/breadcrumb/breadcrumb-bg-2.webp"></div>
            <div class="bd-breadcrumb-wrapper p-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="bd-breadcrumb style-two d-flex-center">
                                <div class="bd-breadcrumb-content">
                                    <h1 class="bd-breadcrumb-title">Student Area</h1>
                                    <div class="bd-breadcrumb-list">
                                        <span><a href="index.php">iStudy</a></span>
                                        <span class="divider"><i class="fa-regular fa-angle-right"></i></span>
                                        <span class="active">Student Area</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bd-breadcrumb-shape">
                        <div class="shape-1"><img src="assets/images/shape/breadcrumb-shape-1.webp" alt="shape"></div>
                        <div class="shape-3"><img src="assets/images/shape/bulb-shape.webp" alt="shape"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->
        <!-- course grid area start -->
        <section class="bd-course-grid-area section-space">
            <div class="container">
                

                <!-- course grid style -->
                <div class="row g-30">
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="bd-course-wrapper style-two">
                            <a href="student-section-a.php" class="bd-course-thumb-wrapper bd-course-thumb-style p-relative">
                                
                                <div class="bd-course-thumb-bg bg-1"><img src="assets/images/course/course-bg-1.webp" alt="images"></div>
                                <div class="bd-course-overly-title fs-180 text-white">CLASS A</div>
                            </a>
                            <div class="bd-course-content">
                                <h5 class="bd-course-title underline mb-10"><a href="student-section-a.php">CLASS A</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="bd-course-wrapper style-two">
                            <a href="student-section-b.php" class="bd-course-thumb-wrapper bd-course-thumb-style p-relative">
                                
                                <div class="bd-course-thumb-bg bg-1"><img src="assets/images/course/course-bg-1.webp" alt="images"></div>
                                <div class="bd-course-overly-title fs-180 text-white">CLASS B</div>
                            </a>
                            <div class="bd-course-content">
                                <h5 class="bd-course-title underline mb-10"><a href="student-section-a.php">CLASS B</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="bd-course-wrapper style-two">
                            <a href="student-section-c.php" class="bd-course-thumb-wrapper bd-course-thumb-style p-relative">
                                
                                <div class="bd-course-thumb-bg bg-1"><img src="assets/images/course/course-bg-1.webp" alt="images"></div>
                                <div class="bd-course-overly-title fs-180 text-white">CLASS C</div>
                            </a>
                            <div class="bd-course-content">
                                <h5 class="bd-course-title underline mb-10"><a href="student-section-a.php">CLASS C</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="bd-course-wrapper style-two">
                            <a href="student-section-d.php" class="bd-course-thumb-wrapper bd-course-thumb-style p-relative">
                                
                                <div class="bd-course-thumb-bg bg-1"><img src="assets/images/course/course-bg-1.webp" alt="images"></div>
                                <div class="bd-course-overly-title fs-180 text-white">CLASS D</div>
                            </a>
                            <div class="bd-course-content">
                                <h5 class="bd-course-title underline mb-10"><a href="student-section-a.php">CLASS D</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- course grid style end -->

                <!-- course-more style -->

                <!-- course-more style end -->
            </div>
        </section>
        <!-- course grid area end -->

    </main>
    <!-- Body main wrapper end -->

    <!-- footer area start -->
<?php include 'footer.php';?>