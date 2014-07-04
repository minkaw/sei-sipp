<?php $this->load->view('template/backend/layout_header_backend'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manajemen Data
        <small>Penjualan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manajemen Data</li>
        <li class="active">Penjualan</li>
        <li class="active">Form</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/penjualan/save" onsubmit="return penjualan()"></br></br>
		<input type="hidden" name="id_penj" value="<?php echo @$detail[0]['id_penj']?>"/>
		<div class="form-group">
			<label class="col-sm-2 control-label" >No Penjualan</label>
			<div class="col-sm-3">
				<?php
					$data ='';
					if(@$detail[0]['no_penj']){ 
						$data = @$detail[0]['no_penj'];
					}else{ 
						$data = 'PJ'. date('dmY-His');
					};
				?>
				<input class="form-control" type="text" name="no_penj" value="<?php echo $data?>" disabled/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Tanggal</label>
			<div class="col-sm-5">
				<input class="form-control" type="text" id="tpj" name="tgl_penj" value="<?php echo @$detail[0]['tgl_penj']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Jumlah</label>
			<div class="col-sm-4">
				<input class="form-control" type="text" id="jpj" name="jml_penj" value="<?php echo @$detail[0]['jml_penj']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Total Harga(Rp)</label>
			<div class="col-sm-4">
				<input class="form-control" type="text" id="thpj" name="totHrg_penj" value="<?php echo @$detail[0]['totHrg_penj']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Keuntungan (Rp)</label>
			<div class="col-sm-4">
				<input class="form-control" type="text" id="k" name="keuntungan" value="<?php echo @$detail[0]['keuntungan']?>"/>
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
			var tgl_penj = document.getElementById('tpj').value;
			var jml_penj = document.getElementById('jpj').value;
			var totHrg_penj = document.getElementById('thpj').value;
			var keuntungan = document.getElementById('k').value;
			
			if(no_penj == null || no_penj == ""){
				alert ("Lengkapi Nomor Penjualan");
				return false;
			}(tgl_penj == null || tgl_penj == ""){
				alert ("Lengkapi Tanggal Penjualan");
				return false;
			}else if(jml_penj == null || jml_penj == ""){
				alert ("Lengkapi Jumlah Penjualan");
				return false;
			}else if(totHrg_penj == null || totHrg_penj == ""){
				alert ("Lengkapi Total Harga Penjualan");
				return false;
			}else if(keuntungan == null || keuntungan == ""){
				alert ("Lengkapi Keuntungan");
				return false;
			}
			no_penj.disabled = false;
		}
		</script>
<?php $this->load->view('template/backend/layout_footer_backend'); ?>