<?php $this->load->view('template/backend/layout_header_backend'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manajemen Data
        <small>Aktivitas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manajemen Data</li>
        <li class="active">Aktivitas</li>
        <li class="active">Form</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/aktivitas/save" onsubmit="return aktivitas()"></br></br>
		<input type="hidden" name="id_ak" value="<?php echo @$detail[0]['id_ak']?>"/>
		<div class="form-group">
			<label class="col-sm-2 control-label" >No Aktivitas</label>
			<div class="col-sm-3">
				<?php
					$data ='';
					if(@$detail[0]['no_ak']){ 
						$data = @$detail[0]['no_ak'];
					}else{ 
						$data = 'AK'. date('dmY-His');
					};
				?>
				<input class="form-control" type="text" id="no_ak" name="no_ak" value="<?php echo $data?>" disabled/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Nama Pekerjaan</label>
			<div class="col-sm-5">
				<input class="form-control" type="text" id="np" name="pekerjaan" value="<?php echo @$detail[0]['pekerjaan']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Jumlah Anggaran (Rp)</label>
			<div class="col-sm-4">
				<input class="form-control" type="text" id="ap" name="anggaran" value="<?php echo @$detail[0]['anggaran']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Progress</label>
			<div class="col-sm-4">
				<input class="form-control" type="text" id="cp" name="progress" value="<?php echo @$detail[0]['progress']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Aksi</label>
			<div class="col-sm-4">
				<input class="form-control" type="text" id="cp" name="aksi" value="<?php echo @$detail[0]['aksi']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Status Aktivitas</label>
			<div class="col-sm-3">
				<select class="form-control" name="status_ak">
					<?php $selected1 =  '' ?>
					<?php $selected2 =  '' ?>
					
					<?php if (@$detail[0]['status_ak'] == "ON"):?>
						<?php $selected1 =  'selected="selected"' ?>
					<?php elseif (@$detail[0]['status_ak'] == "OFF") :?>
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
				<a href="<?php echo base_url('admin/aktivitas') ?>" class="btn btn-primary">Batal</a>
			</div>
		</div>
    </form>
</section><!-- /.content -->
<script>
		function aktivitas(){
			var pekerjaan = document.getElementById('np').value;
			var anggaran = document.getElementById('ap').value;
			var progress = document.getElementById('cp').value;
			var no_ak = document.getElementById('no_ak');
			
			if(pekerjaan == null || pekerjaan == ""){
				alert ("Lengkapi Nama aktivitas");
				return false;
			}else if(anggaran == null || anggaran == ""){
				alert ("Lengkapi Alamat aktivitas");
				return false;
			}else if(progress == null || progress == ""){
				alert ("Lengkapi Contact Person");
				return false;
			}
			no_ak.disabled = false;
		}
		</script>
<?php $this->load->view('template/backend/layout_footer_backend'); ?>