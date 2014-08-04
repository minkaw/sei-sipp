<?php $this->load->view('template/backend/layout_header_backend'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Report Monitoring
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Report Monitoring</li>
        <li class="active">Form</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/reportMonitoring/save" onsubmit="return reportMonitoring()"></br></br>
		<input type="hidden" name="id_report" value="<?php echo @$detail[0]['id_report']?>"/>
		<div class="form-group">
			<label class="col-sm-2 control-label" >No Report</label>
			<div class="col-sm-3">
				<?php
					$data ='';
					if(@$detail[0]['no_report']){ 
						$data = @$detail[0]['no_report'];
					}else{ 
						$data = 'R'. date('dmY-'). @$noreportMonitoring;
					};
				?>
				<input class="form-control" type="text" id="no_report" name="no_report" value="<?php echo $data?>" disabled/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Nama Pekerjaan</label>
			<div class="col-sm-5">
				<input class="form-control" type="text" id="pk" name="pekerjaan" value="<?php echo @$detail[0]['pekerjaan']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Jumlah Anggaran (Rp)</label>
			<div class="col-sm-4">
				<input class="form-control" type="number" id="jr" name="anggaran" value="<?php echo @$detail[0]['anggaran']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Progress</label>
			<div class="col-sm-6">
				<textarea class="form-control" cols="100" rows="5" id="pr" name="progress" style="resize:none;"><?php echo @$detail[0]['progress']?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Aksi</label>
			<div class="col-sm-6">
				<textarea class="form-control" cols="100" rows="5" name="ak" style="resize:none;"><?php echo @$detail[0]['aksi']?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Status Report</label>
			<div class="col-sm-3">
				<select class="form-control" name="status_report">
					<?php $selected1 =  '' ?>
					<?php $selected2 =  '' ?>
					
					<?php if (@$detail[0]['status_report'] == "ON"):?>
						<?php $selected1 =  'selected="selected"' ?>
					<?php elseif (@$detail[0]['status_report'] == "OFF") :?>
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
				<a href="<?php echo base_url('admin/reportMonitoring') ?>" class="btn btn-primary">Batal</a>
			</div>
		</div>
    </form>
</section><!-- /.content -->
<script>
		function reportMonitoring(){
			var pekerjaan = document.getElementById('pk').value;
			var anggaran = document.getElementById('ar').value;
			var progress = document.getElementById('pr').value;
			var aksi = document.getElementById('ak');
			
			if(pekerjaan == null || pekerjaan == ""){
				alert ("Lengkapi Nama Pekerjaan");
				return false;
			}else if(anggaran == null || anggaran == ""){
				alert ("Lengkapi Anggaran");
				return false;
			}else if(progress == null || progress == ""){
				alert ("Lengkapi Progress");
				return false;
			}else if(aksi == null || aksi == ""){
				alert ("Lengkapi Aksi");
				return false;
			}
			no_report.disabled = false;
		}
		</script>
<?php $this->load->view('template/backend/layout_footer_backend'); ?>