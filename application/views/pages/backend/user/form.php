<?php $this->load->view('template/backend/layout_header_backend'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manajemen Data
        <small>User</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manajemen Data</li>
        <li class="active">User</li>
        <li class="active">Form</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/user/save" onsubmit="return user()"></br></br>
		<input type="hidden" name="id_user" value="<?php echo @$detail[0]['id_user']?>"/>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Username</label>
			<div class="col-sm-5">
				<input class="form-control" type="text" id="u" name="username" value="<?php echo @$detail[0]['username']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Password</label>
			<div class="col-sm-4">
				<input class="form-control" type="text" id="pw" name="password" value="<?php echo @$detail[0]['password']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Level</label>
			<div class="col-sm-3">
				<select class="form-control" name="level">
					<?php $selected1 =  '' ?>
					<?php $selected2 =  '' ?>
					<?php $selected3 =  '' ?>
					
					<?php if (@$detail[0]['level'] == "A"):?>
						<?php $selected1 =  'selected="selected"' ?>
					<?php elseif (@$detail[0]['level'] == "AM") :?>
						<?php $selected2 =  'selected="selected"' ?>
					<?php elseif (@$detail[0]['level'] == "KD") :?>
						<?php $selected3 =  'selected="selected"' ?>
					<?php else:?>
						<?php $selected1 =  '' ?>
						<?php $selected2 =  '' ?>
						<?php $selected3 =  '' ?>
					<?php endif;?>
				
					<option value="">-- Pilih salah satu --</option>
					<option value="A"  <?php echo $selected1 ?>>Administrator</option>
					<option value="AM" <?php echo $selected2 ?>>Account Manager</option>
					<option value="KD" <?php echo $selected3 ?>>Kepala Departemen</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Status User</label>
			<div class="col-sm-3">
				<select class="form-control" name="status_user">
					<?php $selected1 =  '' ?>
					<?php $selected2 =  '' ?>
					
					<?php if (@$detail[0]['status_user'] == "ON"):?>
						<?php $selected1 =  'selected="selected"' ?>
					<?php elseif (@$detail[0]['status_user'] == "OFF") :?>
						<?php $selected2 =  'selected="selected"' ?>
					<?php else:?>
						<?php $selected1 =  '' ?>
						<?php $selected2 =  '' ?>
					<?php endif;?>
				
					<option value="">-- Pilih salah satu --</option>
					<option value="ON"  <?php echo $selected1 ?>>ON</option>
					<option value="OFF" <?php echo $selected2 ?>>OFF</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" name="submit" value="Simpan" class="btn btn-default">
				<a href="<?php echo base_url('admin/user') ?>" class="btn btn-primary">Batal</a>
			</div>
		</div>
    </form>
</section><!-- /.content -->
<script>
		function user(){
			var username = document.getElementById('u').value;
			var password = document.getElementById('pw').value;
			
			if(username == null || username == ""){
				alert ("Lengkapi Username");
				return false;
			}else if(password == null || password == ""){
				alert ("Lengkapi Password");
				return false;
			}		
		}
		</script>
<?php $this->load->view('template/backend/layout_footer_backend'); ?>