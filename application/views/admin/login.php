<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | DiffDash - Free Admin Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="<?= base_url().'assets/admin/vendor/bootstrap/css/bootstrap.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url().'assets/admin/vendor/font-awesome/css/font-awesome.min.css' ?>">
  <link rel="stylesheet" href="<?= base_url().'assets/admin/css/main.css' ?>">
  <link rel="stylesheet" href="<?= base_url().'assets/admin/css/demo.css' ?>">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url().'assets/admin/img/apple-icon.png' ?>">
  <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url().'assets/admin/img/favicon.png' ?>">

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
</head>

<body>
	<!-- WRAPPER -->
  <div id="myloading" style="display: none;"></div>
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box">
					<div class="content">
						<div class="header">
							<div class="logo text-center" style="margin-bottom: 25px;"><img src="<?= base_url().'assets/admin/img/logo.png' ?>" alt="DiffDash"></div>
						</div>
            <div id="myalert"></div>
						<form class="form-auth-small" id="login-admin" method="post">
							<div class="form-group">
								<label for="signin-email" class="control-label sr-only">Username</label>
								<input class="form-control" id="signin-email" placeholder="Username" name="username" autocomplete="off" required>
							</div>
							<div class="form-group">
								<label for="signin-password" class="control-label sr-only">Password</label>
								<input type="password" class="form-control" id="signin-password" placeholder="Password" name="password" required>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->

  <script src="<?= base_url().'assets/admin/vendor/jquery/jquery.min.js' ?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      var BaseUrl = '<?= base_url() ?>';

      $('#login-admin').on('submit', function(event){
        event.preventDefault();
        $.ajax({
           url: BaseUrl+'login/login_process',
           method:"POST",
           data:new FormData(this),
           contentType:false,
           cache:false,
           processData:false,
           beforeSend:function(){
              $('#myloading').fadeIn();
            },
           success:function(result){
             var data = JSON.parse(result);
             $('#myloading').fadeOut();
             if (data.hasil == 'fail') {
                 $("#myalert").html('<div class="alert alert-danger"><p class="text-left">' + data.error.not_found + '</p></div>');
                 document.getElementById('signin-email').value = null;
                 document.getElementById('signin-password').value = null;
             } else {
                 window.location=(BaseUrl+'admin/Dashboard');
             }
           }
        })
      });

    });
  </script>

</body>
</html>
