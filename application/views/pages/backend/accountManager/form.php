<?php $this->load->view('template/backend/layout_header_backend'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manajemen Data
        <small>Account Manager</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manajemen Data</li>
        <li class="active">Account Manager</li>
        <li class="active">Form</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/accountManager/save" onsubmit="return accountManager()"></br></br>
		<input type="hidden" name="no_am" value="<?php echo @$detail[0]['no_am']?>"/>
		<div class="form-group">
			<label class="col-sm-2 control-label" >NIK</label>
			<div class="col-sm-5">
				<input class="form-control" type="text" id="nik" name="nik" value="<?php echo @$detail[0]['nik']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Nama</label>
			<div class="col-sm-5">
				<input class="form-control" type="text" id="na" name="nama_am" value="<?php echo @$detail[0]['nama_am']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Alamat</label>
			<div class="col-sm-4">
				<input class="form-control" type="text" id="aa" name="alamat_am" value="<?php echo @$detail[0]['alamat_am']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Telepon</label>
			<div class="col-sm-4">
				<input class="form-control" type="text" id="ta" name="tlp_am" value="<?php echo @$detail[0]['tlp_am']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Email</label>
			<div class="col-sm-4">
				<input class="form-control" type="email" id="ea" name="email_am" value="<?php echo @$detail[0]['email_am']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Penggunaan Username</label>
			<div class="col-sm-3">
				<?php if (@$detail[0]['id_user']):?>
					<input class="form-control" type="hidden" name="id_user" value="<?php echo @$detail[0]['id_user']?>"/>
					<input class="form-control" type="text" readonly value="<?php echo @$detail[0]['username']?>"/>
				<?php else :?>
					<select class="form-control" name="id_user">
						<option value=""> -- </option>
						<?php if (@$comboUser):?>
							<?php foreach ($comboUser as $row):?>
								<?php if ($row['id_user'] == @$detail[0]['id_user']):?>
									<?php $selected =  'selected="selected"' ?>
								<?php else :?>
									<?php $selected =  '' ?>
								<?php endif;?>
								<option value="<?php echo $row['id_user'] ?>" <?php echo $selected ?> ><?php echo $row['username'] ?></option>
							<?php endforeach?>
						<?php endif?>
					</select>
				<?php endif;?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Status AM</label>
			<div class="col-sm-3">
				<select class="form-control" name="status_am">
					<?php $selected1 =  '' ?>
					<?php $selected2 =  '' ?>
					
					<?php if (@$detail[0]['status_am'] == "ON"):?>
						<?php $selected1 =  'selected="selected"' ?>
					<?php elseif (@$detail[0]['status_am'] == "OFF") :?>
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
				<a href="<?php echo base_url('admin/accountManager') ?>" class="btn btn-primary">Batal</a>
			</div>
		</div>
    </form>
</section><!-- /.content -->
<script>
		function user(){
			var nik = document.getElementById('nik').value;
			var nama_am = document.getElementById('na').value;
			var alamat_am = document.getElementById('aa').value;
			var tlp_am = document.getElementById('ta').value;
			var email_am = document.getElementById('ea').value;
			
			if(nik == null || nik == ""){
				alert ("Lengkapi NIK");
				return false;
			}else if(nama_am == null || nama_am == ""){
				alert ("Lengkapi Nama Account Manager");
				return false;
			}else if(alamat_am == null || alamat_am == ""){
				alert ("Lengkapi Alamat Account Manager");
				return false;
			}else if(tlp_am == null || tlp_am == ""){
				alert ("Lengkapi Telepon Account Manager");
				return false;
			}else if(email_am == null || email_am == ""){
				alert ("Lengkapi Email Account Manager");
				return false;
			
			}		
		}
		</script>
<?php $this->load->view('template/backend/layout_footer_backend'); ?>