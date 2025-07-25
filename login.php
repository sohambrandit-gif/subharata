<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign In</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/favicon.svg">
    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/animate.min.css">
    <link rel="stylesheet" href="assets/css/plugins/swiper.min.css">
    <link rel="stylesheet" href="assets/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/vendor/fontawesome-pro.css">
    <link rel="stylesheet" href="assets/css/plugins/nouislider.min.css">
    <link rel="stylesheet" href="assets/css/vendor/icomoon.css">
    <link rel="stylesheet" href="assets/css/vendor/spacing.css">
    <link rel="stylesheet" href="assets/css/plugins/apexcharts.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <?php if(isset($_SESSION['login']) && $_SESSION['login']!= '' ){  redir('index.php');} ?>
    <?php $code=$_GET['msg']; $_SESSION['return_url'] = $_GET['redirect']; ?>

    <!-- preloader start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="bd-preloader-content">
                    <div class="bd-preloader-logo">
                        <div class="bd-preloader-circle">
                            <svg width="190" height="190" viewBox="0 0 380 380" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle stroke="#F5F5F5" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round">
                                </circle>
                                <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round">
                                </circle>
                            </svg>
                        </div>
                        <img src="assets/images/logo/preloader-icon.png" alt="">
                    </div>
                    <p class="bd-preloader-subtitle">Loading...</p>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->

    <!-- Body main wrapper start -->
    <main>

        <!-- sign form area start -->
        <section class="bd-authentication-cover-main ">
            <div class="row h100vh mx-0">
                <div class="col-xxl-6 col-xl-5 col-lg-12 d-xl-block d-none px-0">
                    <div class="bd-authentication-cover overflow-hidden" data-background="assets/images/contact/sign-in-bg.webp">
                        <div class="bd-authentication-cover-content d-flex-center d-none">
                            <div class="bd-section-title-wrapper">
                                <h2 class="bd-section-title mb-20">Welcome Back!</h2>
                                <p class="bd-section-paragraph">Sign in to continue your journey and unlock a world of
                                    opportunities.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-7">
                    <div class="row justify-content-center align-items-center h100p">
                        <div class="col-xxl-7 col-xl-9 col-lg-6 col-md-6 col-sm-8 col-12">
                            <div class="bd-authentication-form-wrapper">
                                <div class="bd-authentication-form-logo">
                                    <a href="index.html"><img src="assets/images/logo/logo.svg" alt="logo"></a>
                                </div>
                                <h3 class="title mb-10">Sign In</h3>
                                <p class="subtitle">Welcome back Wick</p>
                                <form action="login_chk.php" method="post" class="form-login form-has-password">
                                    <div class="form-input-box mb-20">
                                        <div class="form-input-title">
                                            <label for="emailAddress">Email Address <span>*</span></label>
                                        </div>
                                        <div class="form-input">
                                            <input name="email" id="emailAddress" type="email" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="form-input-box mb-20">
                                        <div class="form-input-title">
                                            <label for="password">Password <span>*</span></label>
                                        </div>
                                        <div class="form-input">
                                            <input name="password" id="password" type="password" placeholder="Your Password">
                                        </div>
                                    </div>
                                    <div class="d-flex-between mb-20">
                                        <div class="checkout-option">
                                            <input id="rememberMe" type="checkbox" name="remember" value="1">
                                            <label for="rememberMe">Remember me</label>
                                        </div>
                                        <div class="sign-forgot underline">
                                            <a href="forget-password.php" class="sign-link">Forgot Password?</a>
                                        </div>
                                    </div>
                                    
                                        <div class="bd-sign-btn">
                                            <button type="submit" class="bd-btn btn-primary w-100" >Sign In</button>
                                        </div>
                                    
                                    
                                </form>
                                <div class="bd-divider-wrapper">
                                    <div class="bd-divider-line left-line"></div>
                                    <span class="bd-divider-title">OR SignIn With</span>
                                    <div class="bd-divider-line"></div>
                                </div>
                                <div class="bd-alter-sign mb-20">
                                    <button class="bd-btn btn-outline-secondary w-100" type="button"><span
                                            class="thumb"><img src="assets/images/shape/google.svg"
                                                alt="facebook"></span>Google
                                    </button>
                                </div>
                                <div class="bd-sign-up-label underline-two text-center">
                                    Don't have an account?<a href="register.php" class="sign-link"> Sign up</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- sign form area end -->

    </main>
    <!-- Body main wrapper end -->

    <!-- back to top -->
    <div class="backtotop-wrap cursor-pointer">
        <svg class="backtotop-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Backtotop end -->

    <!-- JS here -->
    <script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins/swiper.min.js"></script>
    <script src="assets/js/plugins/wow.js"></script>
    <script src="assets/js/vendor/magnific-popup.min.js"></script>
    <script src="assets/js/vendor/isotope.pkgd.min.js"></script>
    <script src="assets/js/vendor/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <script src="assets/js/vendor/ajax-form.js"></script>
    <script src="assets/js/plugins/easypie.js"></script>
    <script src="assets/js/vendor/purecounter.js"></script>
    <script src="assets/js/plugins/nouislider.min.js"></script>
    <script src="assets/js/plugins/apexcharts.min.js"></script>
    <script src="assets/js/plugins/typed.js"></script>
    <script src="assets/js/main.js"></script>
</body>


</html>