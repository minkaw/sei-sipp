<?php $this->load->view('template/backend/layout_header_backend'); ?>
<!-- CONtent Header (Page header) -->
<sectiON class="cONtent-header">
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
</sectiON>

<!-- Main cONtent -->
<sectiON class="cONtent">
    <form class="form-horizONtal" method="post" actiON="<?php echo base_url();?>admin/preOrder/save" ONsubmit="return preOrder()"></br></br>
		<input type="hidden" name="id_po" value="<?php echo @$detail[0]['id_po']?>"/>
		<div class="form-group">
			<label class="col-sm-2 cONtrol-label" >No PO</label>
			<div class="col-sm-5">
				<input class="form-cONtrol" type="text" id="npo" name="no_po" value="<?php echo @$detail[0]['no_po']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 cONtrol-label" >Tanggal</label>
			<div class="col-sm-5">
				<input class="form-cONtrol" type="text" id="tpo" name="tgl_po" value="<?php echo @$detail[0]['tgl_po']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 cONtrol-label" >Jumlah</label>
			<div class="col-sm-5">
				<input class="form-cONtrol" type="text" id="jp" name="jml_po" value="<?php echo @$detail[0]['jml_po']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 cONtrol-label" >Total Harga</label>
			<div class="col-sm-4">
				<input class="form-cONtrol" type="text" id="thp" name="totHrg_po" value="<?php echo @$detail[0]['totHrg_po']?>"/>
			</div>
		</div>
		<div clas<div class="form-group">
			<label class="col-sm-2 cONtrol-label" >Deadline</label>
			<div class="col-sm-4">
				<input class="form-cONtrol" type="text" id="dl" name="deadline" value="<?php echo @$detail[0]['deadline']?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 cONtrol-label">Status PO</label>
			<div class="col-sm-3">
				<select class="form-cONtrol" name="status_po">
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
</sectiON><!-- /.cONtent -->
<script>
		functiON user(){
			var no_po = document.getElementById('npo').value;
			var tgl_po = document.getElementById('jpo').value;
			var jml_po = document.getElementById('jp').value;
			var totHrg_po = document.getElementById('thp').value;
			var deadline = document.getElementById('dl').value;
			
			if(no_po == null || no_po == ""){
				alert ("Lengkapi Nomor Pre Order");
				return false;
			}else if(tgl_po == null || tgl_po == ""){
				alert ("Lengkapi Tanggal Pre Order");
				return false;
			}else if(jml_po == null || jml_po == ""){
				alert ("Lengkapi Jumlah Pre Order");
				return false;
			}else if(totHrg_po == null || totHrg_po == ""){
				alert ("Lengkapi Total Harga Pre Order");
				return false;
			}else if(deadline == null || deadline == ""){
				alert ("Lengkapi Deadline Pre Order");
				return false;
			}		
		}
		</script>
<?php $this->load->view('template/backend/layout_footer_backend'); ?>