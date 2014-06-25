<?php $this->load->view('template/frontend/layout_header_frontend')?>
        
	<!-- Page Title -->
	<div class="section section-breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Registration</h1>
				</div>
			</div>
		</div>
	</div>
	
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-sm-5">
					<div class="basic-login">
						<form role="form" method="post" action="<?php echo base_url();?>home/registration/save" onsubmit="return pelanggan()">
							<input type="hidden" name="level" value="PL" />
							<?php $error = $this->session->flashdata('error');?>
							<?php if ($error):?>
								<div class="alert alert-danger" style="text-align:center">
									Maaf, No. Pelanggan anda belum terdaftar
								</div>
							<?php endif?>
							<?php $success = $this->session->flashdata('success');?>
							<?php if ($success):?>
								<div class="alert alert-success" style="text-align:center">
									Terima Kasih, Registrasi anda berhasil
								</div>
							<?php endif?>
							<div class="form-group">
								<label for="login-nopelanggan"><i class="icon-user"></i> <b>No. Pelanggan</b></label>
								<input class="form-control" id="login-nopelanggan" type="text" id="no_pl" name="no_pelanggan" />
							</div>
							<div class="form-group">
								<label for="login-username"><i class="icon-user"></i> <b>Username</b></label>
								<input class="form-control" id="login-username" type="text" id="username" name="username" placeholder="" />
							</div>
							<div class="form-group">
								<label for="login-password"><i class="icon-lock"></i> <b>Password</b></label>
								<input class="form-control" id="login-password" type="password" id="password" name="password" placeholder="" />
							</div>
							<div class="form-group">
								<input type="submit" name="submit" value="Register here" class="btn pull-right">
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
		function pelanggan(){
			var no_pl = document.getElementById('no_pl').value;
			var username = document.getElementById('username').value;
			var password = document.getElementById('password').value;
			
			if(no_pl == null || no_pl == ""){
				alert ("No. Pelanggan tidak boleh kosong");
				return false;
			}else if(username == null || username == ""){
				alert ("Username tidak boleh kosong");
				return false;
			}else if(password == null || password == ""){
				alert ("Password tidak boleh kosong");
				return false;
			}
		}
		</script>
<?php $this->load->view('template/frontend/layout_footer_frontend')?>