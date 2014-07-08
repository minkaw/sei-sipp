<?php $this->load->view('template/backend/layout_header_backend'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Penjualan
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Penjualan</li>
        <li class="active">Form</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/penjualan/save" onsubmit="return penjualan()"></br></br>
		<input type="hidden" name="id_penj" value="<?php echo @$detail[0]['id_penj']?>"/>
		<input type="hidden" name="id_po" value="<?php echo @$id_po; ?>"/>
		<div class="form-group">
			<label class="col-sm-2 control-label" >No Penjualan</label>
			<div class="col-sm-3">
				<?php
					$data ='';
					if(@$detail[0]['no_penj']){ 
						$data = @$detail[0]['no_penj'];
					}else{ 
						$data = 'PJ'. date('dmY-'). @$noPenjualan;
					};
				?>
				<input class="form-control" type="text" id="no_penj" name="no_penj" value="<?php echo $data?>" disabled/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Tanggal</label>
			<div class="col-sm-5">
				<input class="form-control" type="date" id="tpj" name="tgl_penj" value="<?php echo @$detail[0]['tgl_penj']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Status Perjualan</label>
			<div class="col-sm-3">
				<select class="form-control" name="status_penjualan">
					<?php $selected1 =  '' ?>
					<?php $selected2 =  '' ?>
					
					<?php if (@$detail[0]['status_penjualan'] == "1"):?>
						<?php $selected1 =  'selected="selected"' ?>
					<?php elseif (@$detail[0]['status_penjualan'] == "0") :?>
						<?php $selected2 =  'selected="selected"' ?>
					<?php else:?>
						<?php $selected1 =  '' ?>
						<?php $selected2 =  '' ?>
					<?php endif;?>
				
					<option value="">-- Pilih salah satu --</option>
					<option value="1"  <?php echo $selected1 ?>>Telah Terjual</option>
					<option value="0" <?php echo $selected2 ?>>Belum Terjual</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" name="submit" value="Simpan" class="btn btn-default">
				<a href="<?php echo base_url('admin/penjualan') ?>" class="btn btn-primary">Batal</a>
			</div>
		</div>
    </form>
</section><!-- /.content -->
<script>
		function penjualan(){
			var no_penj = document.getElementById('no_penj');
			var tgl_penj = document.getElementById('tpj').value;
			
			if(no_penj == null || no_penj == ""){
				alert ("Lengkapi Nomor Penjualan");
				return false;
			}else if(tgl_penj == null || tgl_penj == ""){
				alert ("Lengkapi Tanggal Penjualan");
				return false;
			}
			no_penj.disabled = false;
		}
		</script>
<?php $this->load->view('template/backend/layout_footer_backend'); ?>