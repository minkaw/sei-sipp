<?php $this->load->view('template/backend/layout_header_backend'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manajemen Data
        <small>Produk</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manajemen Data</li>
        <li class="active">Produk</li>
        <li class="active">Form</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
	<form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/produk/save" onsubmit="return produk()"></br></br>
		<input type="hidden" name="id_prod" value="<?php echo @$detail[0]['id_prod']?>"/>
		<div class="form-group">
			<label class="col-sm-2 control-label" >No Produk</label>
			<div class="col-sm-5">
				<input class="form-control" type="text" id="nop" name="no_prod" value="<?php echo @$detail[0]['no_prod']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Nama Produk</label>
			<div class="col-sm-4">
				<input class="form-control" type="text" id="nap" name="nama_prod" value="<?php echo @$detail[0]['nama_prod']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Harga Produk (Rp)</label>
			<div class="col-sm-4">
				<input class="form-control" type="text" id="hp" name="hrg_prod" value="<?php echo @$detail[0]['hrg_prod']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Kapasitas (Wp)</label>
			<div class="col-sm-4">
				<input class="form-control" type="text" id="k" name="kapasitas" value="<?php echo @$detail[0]['kapasitas']?>"/>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" name="submit" value="Simpan" class="btn btn-default">
				<a href="<?php echo base_url('admin/produk') ?>" class="btn btn-primary">Batal</a>
			</div>
		</div>
    </form>
</section><!-- /.content -->
<script>
		function produk(){
			var no_prod = document.getElementById('nop').value;
			var nama_prod = document.getElementById('nap').value;
			var hrg_prod = document.getElementById('hp').value;
			var kapasitas = document.getElementById('k').value;
			
			if(no_prod == null || no_prod == ""){
				alert ("Lengkapi Nomor Produk");
				return false;
			}else if(nama_prod == null || nama_prod == ""){
				alert ("Lengkapi Nama Produk");
				return false;
			}else if(hrg_prod == null || hrg_prod == ""){
				alert ("Lengkapi Harga Produk");
				return false;
			}else if(kapasitas == null || kapasitas == ""){
				alert ("Lengkapi Kapasitas");
				return false;
			}		
		}
		</script>
<?php $this->load->view('template/backend/layout_footer_backend'); ?>