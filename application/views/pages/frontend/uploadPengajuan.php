<?php $this->load->view('template/frontend/layout_header_frontend')?>
        
	<!-- Page Title -->
	<div class="section section-breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Upload Pengajuan Pesanan</h1>
				</div>
			</div>
		</div>
	</div>
	
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<?php $this->load->view('template/frontend/layout_alert')?>
					
					<form class="form-horizontal" method="post" action="<?php echo base_url();?>home/uploadPengajuan/save" onsubmit="return upload()"  enctype="multipart/form-data">
						<input type="hidden" name="id_surat" value=""/>
						<input type="hidden" name="status_surat" value="UNAPPROVE"/>
						<input type="hidden" name="no_pelanggan" value="<?php echo $this->session->userdata('noPelanggan');?>"/>
						<div class="form-group">
							<label class="col-sm-2 control-label" >No. Pelanggan</label>
							<div class="col-sm-5">
								<input class="form-control" type="file" id="nama_file" name="nama_file" value=""/>
								file yang dibolehkan untuk diupload adalah jpg, png, atau gif
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="submit" name="submit" value="Kirim" class="btn btn-default">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		function upload(){
			var nama_file = document.getElementById('nama_file').value;
			
			if(nama_file == null || nama_file == ""){
				alert ("Upload tidak boleh kosong");
				return false;
			}
		}
	</script>
<?php $this->load->view('template/frontend/layout_footer_frontend')?>