<?php $success = $this->session->flashdata('success');?>
<?php if ($success):?>
	<div class="alert alert-success alert-dismissable">
		<i class="fa fa-check"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<b>Sukses - </b> Data Berhasil Diproses
	</div>
<?php endif?>

<?php $delete = $this->session->flashdata('delete');?>
<?php if ($delete):?>
	<div class="alert alert-success alert-dismissable">
		<i class="fa fa-check"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<b>Sukses - </b> Data Berhasil Dihapus
	</div>
<?php endif?>

<?php $error = $this->session->flashdata('error');?>
<?php if ($error):?>
	<div class="alert alert-danger alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<b>Alert!</b> Data Tidak Bisa Diproses
	</div>
<?php endif?>

<?php $failed = $this->session->flashdata('failed');?>
<?php if ($failed):?>
	<div class="alert alert-warning alert-dismissable">
		<i class="fa fa-warning"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<b>Warning!</b> Data <?php echo $this->session->flashdata('flag'); ?> Tidak Diketemukan
	</div>
<?php endif?>