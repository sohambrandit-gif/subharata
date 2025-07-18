<?php include 'head.php'; ?>
</head>
<body>
<!-- Main Wrapper -->
<div class="main-wrapper login-body">
  <div class="login-wrapper">
    <div class="container">
      <div class="loginbox">
        <div class="login-left" style="background: #222;color: #fff;font-size: 49px;"><?php echo $company; ?></div>
        <div class="login-right">
          <div class="login-right-wrap">
            <div class="lock-user"> <img class="rounded-circle" src="favicon/favicon.svg?v" alt="User Image">
              <h4><?php echo $company; ?></h4>
            </div>
            <!-- Form -->
            <form action="login_chk.php" method="post">
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Password" name="password">
              </div>
              <div class="form-group mb-0">
                <button class="btn btn-primary btn-block" type="submit">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Main Wrapper -->
<!-- jQuery -->
<script src="assets/js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<!-- Custom JS -->
<script src="assets/js/script.js?v=2"></script>
</body>
</html>