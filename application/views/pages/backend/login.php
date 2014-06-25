<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/login-style.css') ?>">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Login</h1>
      <form accept-charset="UTF-8" action="<?php echo site_url('admin/login/validate') ?>" method="post" class="">
		<?php $msg = $this->session->flashdata('error');?>
		<?php if ($msg):?>
			<div class="alert alert-error" style="text-align:center">
				Maaf, Username atau password salah!
			</div>
		<?php endif?>
        <p><input type="text" name="username" value="" placeholder="Username" value="<?php echo $this->session->flashdata('username');?>"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>
  </section>
  <section class="about">
    <p class="about-author">
      &copy; 2014 - PT SEI - SIPP
  </section>
</body>
</html>
