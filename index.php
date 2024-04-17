<?php include 'controller/helper/url.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, noble ui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web, nobleuihtml">

	<title>WeSell | login</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="<?php echo getHost(); ?>fatawu/assets/vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="<?php echo getHost(); ?>fatawu/assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="<?php echo getHost(); ?>fatawu/assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="<?php echo getHost(); ?>fatawu/assets/css/demo1/style.min.css">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="<?php echo getHost(); ?>fatawu/assets/images/favicon.png" />
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col-md-4 pe-md-0">
                  <div class="auth-side-wrapper">

                  </div>
                </div>
                <div class="col-md-8 ps-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2">We<span>Sell</span></a>
                    <?php if(isset($_SESSION["errorlogin"])){ ?>
                        <div class="alert alert-danger" role="alert">Either the username or password you entered is incorrect</div>
                        
                    <?php 
                    session_unset();
                    session_destroy();
                }else { 
                    session_unset();
                        session_destroy();?>
                        <h5 class="text-muted fw-normal mb-4">Welcome! Log in to your account.</h5>
                        <?php } ?>
                    
                    <form class="forms-sample" method="POST" action="<?php echo getHost(); ?>fatawu/auth">
                      <div class="mb-3">
                        <label for="userEmail" class="form-label">Username</label>
                        <input type="text" class="form-control" required id="username" name="username" placeholder="Username">
                      </div>
                      <div class="mb-3">
                        <label for="userPassword" required class="form-label">Password</label>
                        <input type="password" class="form-control" id="userpassword" name="userpassword" autocomplete="current-password" placeholder="Password">
                      </div>
                      <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="authCheck">
                        <label class="form-check-label" for="authCheck">
                          Remember me
                        </label>
                      </div>
                      <div>
                       
                        <button type="submit" name="authenticate" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                          Login
                        </button>
                      </div>
                      
                    </form>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- core:js -->
	<script src="<?php echo getHost(); ?>fatawu/assets/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="<?php echo getHost(); ?>fatawu/assets/vendors/feather-icons/feather.min.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
	<!-- End custom js for this page -->

</body>
</html>