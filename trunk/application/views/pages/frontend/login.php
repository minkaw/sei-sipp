<?php $this->load->view('template/frontend/layout_header_frontend')?>
        
	<!-- Page Title -->
	<div class="section section-breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Login</h1>
				</div>
			</div>
		</div>
	</div>
	
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-sm-5">
					<div class="basic-login">
						<form role="form" role="form" action="<?php echo base_url();?>home/login/validate" method="post">
							<?php $msg = $this->session->flashdata('error');?>
							<?php if ($msg):?>
								<div class="alert alert-danger" style="text-align:center">
									Maaf, Username atau password salah!
								</div>
							<?php endif?>
							<div class="form-group">
								<label for="login-username"><i class="icon-user"></i> <b>Username</b></label>
								<input class="form-control" id="login-username" type="text" name="username" placeholder="">
							</div>
							<div class="form-group">
								<label for="login-password"><i class="icon-lock"></i> <b>Password</b></label>
								<input class="form-control" id="login-password" type="password" name="password" placeholder="">
							</div>
							<div class="form-group">
								<button type="submit" class="btn pull-right">Login</button>
								<a href="<?php echo base_url('home/registration') ?>" class="btn btn-primary">Register here</a>
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $this->load->view('template/frontend/layout_footer_frontend')?>