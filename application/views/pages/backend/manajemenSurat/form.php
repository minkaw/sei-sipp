<?php $this->load->view('template/backend/layout_header_backend'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manajemen Data
        <small>Manajemen Surat</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manajemen Data</li>
        <li class="active">Manajemen Surat</li>
        <li class="active">Form</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/manajemenSurat/save" onsubmit="return manajemenSurat()"></br></br>
		<input type="hidden" name="id_surat" value="<?php echo @$detail[0]['id_surat']?>"/>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Nama File</label>
			<div class="col-sm-5">
				<div class="input-group">
					<input class="form-control" type="text" name="nama_file" value="<?php echo @$detail[0]['nama_file']?>" disabled/>
					<div class="input-group-btn">
						<button type="button" class="btn">Lihat Dokumen</button>
					</div><!-- /btn-group -->
				</div>
				
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Status Surat</label>
			<div class="col-sm-3">
				<select class="form-control" name="status_surat">
					<?php $selected1 =  '' ?>
					<?php $selected2 =  '' ?>
					
					<?php if (@$detail[0]['status_surat'] == "APPROVE"):?>
						<?php $selected1 =  'selected="selected"' ?>
					<?php elseif (@$detail[0]['status_surat'] == "UNAPPROVE") :?>
						<?php $selected2 =  'selected="selected"' ?>
					<?php else:?>
						<?php $selected1 =  '' ?>
						<?php $selected2 =  '' ?>
					<?php endif;?>
				
					<option value="">-- Pilih salah satu --</option>
					<option value="APPROVE"  <?php echo $selected1 ?>>APPROVE</option>
					<option value="UNAPPROVE" <?php echo $selected2 ?>>UNAPPROVE</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Account Manager</label>
			<div class="col-sm-3">
				<select class="form-control" name="no_am">
					<option value=""> -- </option>
					<?php if (@$comboAM):?>
						<?php foreach ($comboAM as $row):?>
							<?php if ($row['no_am'] == @$detail[0]['no_am']):?>
								<?php $selected =  'selected="selected"' ?>
							<?php else :?>
								<?php $selected =  '' ?>
							<?php endif;?>
							<option value="<?php echo $row['no_am'] ?>" <?php echo $selected ?> ><?php echo $row['nama_am'] ?></option>
						<?php endforeach?>
					<?php endif?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Keterangan</label>
			<div class="col-sm-5">
				<textarea class="form-control" cols="100" rows="5" name="keterangan" id="kt" style="resize:none;"><?php echo @$detail[0]['keterangan']?></textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" name="submit" value="Simpan" class="btn btn-default">
				<a href="<?php echo base_url('admin/manajemenSurat') ?>" class="btn btn-primary">Batal</a>
			</div>
		</div>
    </form>
</section><!-- /.content -->
<script>
		function manajemenSurat(){
			var nama_file = document.getElementById('nf').value;
			var keterangan = document.getElementById('kt').value;
			
			if(nama_file == null || nama_file == ""){
				alert ("Lengkapi nama_file");
				return false;
			}else if(keterangan == null || keterangan == ""){
				alert ("Lengkapi keterangan");
				return false;
			}		
		}
		</script>
<?php $this->load->view('template/backend/layout_footer_backend'); ?>