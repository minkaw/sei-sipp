<?php $this->load->view('template/backend/layout_header_backend'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manajemen Data
        <small>Pelanggan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manajemen Data</li>
        <li class="active">Pelanggan</li>
        <li class="active">Form</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/pelanggan/save" onsubmit="return pelanggan()"></br></br>
		<input type="hidden" name="id_plgn" value="<?php echo @$detail[0]['id_plgn']?>"/>
		<div class="form-group">
			<label class="col-sm-2 control-label" >No Pelanggan</label>
			<div class="col-sm-3">
				<?php
					$data ='';
					if(@$detail[0]['no_pelanggan']){ 
						$data = @$detail[0]['no_pelanggan'];
					}else{ 
						$data = 'PL'. date('dmY-His');
					};
				?>
				<input class="form-control" type="text" id="no_pelanggan" name="no_pelanggan" value="<?php echo $data?>" disabled/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Nama Pelanggan</label>
			<div class="col-sm-5">
				<input class="form-control" type="text" id="np" name="nama_plgn" value="<?php echo @$detail[0]['nama_plgn']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Alamat Pelanggan</label>
			<div class="col-sm-4">
				<input class="form-control" type="text" id="ap" name="alamat_plgn" value="<?php echo @$detail[0]['alamat_plgn']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Contact Person</label>
			<div class="col-sm-4">
				<input class="form-control" type="text" id="cp" name="cp_plgn" value="<?php echo @$detail[0]['cp_plgn']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Status pelanggan</label>
			<div class="col-sm-3">
				<select class="form-control" name="status_plgn">
					<?php $selected1 =  '' ?>
					<?php $selected2 =  '' ?>
					
					<?php if (@$detail[0]['status_plgn'] == "ON"):?>
						<?php $selected1 =  'selected="selected"' ?>
					<?php elseif (@$detail[0]['status_plgn'] == "OFF") :?>
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
			<label class="col-sm-2 control-label" >Daftar PO</label>
			<div class="col-sm-4">
				<input class="form-control" type="text" name="daftar_po" value="<?php echo @$detail[0]['daftar_po']?>"/>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" name="submit" value="Simpan" class="btn btn-default">
				<a href="<?php echo base_url('admin/pelanggan') ?>" class="btn btn-primary">Batal</a>
			</div>
		</div>
    </form>
</section><!-- /.content -->
<script>
		function pelanggan(){
			var nama_plgn = document.getElementById('np').value;
			var alamat_plgn = document.getElementById('ap').value;
			var cp_plgn = document.getElementById('cp').value;
			var no_pelanggan = document.getElementById('no_pelanggan');
			
			if(nama_plgn == null || nama_plgn == ""){
				alert ("Lengkapi Nama Pelanggan");
				return false;
			}else if(alamat_plgn == null || alamat_plgn == ""){
				alert ("Lengkapi Alamat Pelanggan");
				return false;
			}else if(cp_plgn == null || cp_plgn == ""){
				alert ("Lengkapi Contact Person");
				return false;
			}
			no_pelanggan.disabled = false;
		}
		</script>
<?php $this->load->view('template/backend/layout_footer_backend'); ?>