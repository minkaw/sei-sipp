<?php $this->load->view('template/backend/layout_header_backend'); ?>
<!-- content Header (Page header) -->
<section class="content-header">
    <h1>
        Manajemen Data
        <small>Pre Order</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manajemen Data</li>
        <li class="active">Pre Order</li>
        <li class="active">Form</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <form class="form-horizontal" method="post" actiON="<?php echo base_url();?>admin/preOrder/save" ONsubmit="return preOrder()"></br></br>
		<input type="hidden" name="id_po" value="<?php echo @$detail[0]['id_po']?>"/>
		<div class="form-group">
			<label class="col-sm-2 control-label" >No. Pre Order</label>
			<div class="col-sm-3">
				<?php
					$data ='';
					if(@$detail[0]['no_po']){ 
						$data = @$detail[0]['no_po'];
					}else{ 
						$data = 'PO'. date('dmY-'). @$noPreOrder;
					};
				?>
				<input class="form-control" type="text" id="npo" name="no_po" value="<?php echo $data; ?>" disabled/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >No. Pelanggan</label>
			<div class="col-sm-3">
				<input class="form-control" type="text" id="no_pelanggan" name="no_pelanggan" value="<?php echo @$detail[0]['no_pelanggan']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Tgl Pre Order</label>
			<div class="col-sm-3">
				<input class="form-control" type="date" id="tpo" name="tgl_po" value="<?php echo @$detail[0]['tgl_po']?>"/>
			</div>
		</div>
		<div clas<div class="form-group">
			<label class="col-sm-2 control-label" >Deadline</label>
			<div class="col-sm-3">
				<input class="form-control" type="date" id="dl" name="deadline" value="<?php echo @$detail[0]['deadline']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Status PO</label>
			<div class="col-sm-3">
				<select class="form-control" id="status_po" name="status_po">
					<?php $selected1 =  '' ?>
					<?php $selected2 =  '' ?>
					
					<?php if (@$detail[0]['status_po'] == "Process"):?>
						<?php $selected1 =  'selected="selected"' ?>
					<?php elseif (@$detail[0]['status_po'] == "Overtime") :?>
						<?php $selected2 =  'selected="selected"' ?>
					<?php elseif (@$detail[0]['status_po'] == "Finish") :?>
						<?php $selected2 =  'selected="selected"' ?>
					<?php else:?>
						<?php $selected1 =  '' ?>
						<?php $selected2 =  '' ?>
						<?php $selected3 =  '' ?>
					<?php endif;?>
				
					<optiON value="">-- Pilih salah satu --</optiON>
					<optiON value="Process"  <?php echo $selected1 ?>>Process</optiON>
					<optiON value="Overtime" <?php echo $selected2 ?>>Overtime</optiON>
					<optiON value="Finish" <?php echo $selected2 ?>>Finish</optiON>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" name="submit" value="Simpan" class="btn btn-default">
				<a href="<?php echo base_url('admin/preOrder') ?>" class="btn btn-primary">Batal</a>
			</div>
		</div>
    </form>
</section><!-- /.content -->
<script>
		function preOrder(){
			var no_po = document.getElementById('npo');
			var no_pelanggan = document.getElementById('no_pelanggan').value;
			var tgl_po = document.getElementById('tpo').value;
			var deadline = document.getElementById('dl').value;
			var status_po = document.getElementById('status_po').value;
			
			if(no_pelanggan == null || no_pelanggan == ""){
				alert ("Lengkapi Nomor Pelanggan");
				return false;
			}else if(tgl_po == null || tgl_po == ""){
				alert ("Lengkapi Tanggal Pre Order");
				return false;
			}else if(deadline == null || deadline == ""){
				alert ("Lengkapi Deadline Pre Order");
				return false;
			}else if(status_po == null || status_po == ""){
				alert ("Lengkapi Status Pre Order");
				return false;
			}		
			npo.disabled = false;
		}
		</script>
<?php $this->load->view('template/backend/layout_footer_backend'); ?>