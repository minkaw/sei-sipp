<?php $this->load->view('template/frontend/layout_header_frontend')?>
        
	<!-- Page Title -->
	<div class="section section-breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Persetujuan Pre Order</h1>
				</div>
			</div>
		</div>
	</div>
	
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<?php $this->load->view('template/frontend/layout_alert')?>
					<?php if(@$nilai == 1):?>
					<form class="form-horizontal" method="post" action="<?php echo base_url();?>home/persetujuanPO/save" >
						<input type="hidden" name="id_po" value="<?php echo @$detail[0]['id_po']?>"/>
						<input type="hidden" name="no_po" value="<?php echo @$detail[0]['no_po']?>"/>
						<input type="hidden" name="no_pelanggan" value="<?php echo @$detail[0]['no_pelanggan']?>"/>
						<input type="hidden" name="tgl_po" value="<?php echo @$detail[0]['tgl_po']?>"/>
						<input type="hidden" name="deadline" value="<?php echo @$detail[0]['deadline']?>"/>
						<input type="hidden" name="status_po" value="<?php echo @$detail[0]['status_po']?>"/>
						<input type="hidden" name="persetujuan_po" value="<?php echo @$detail[0]['persetujuan_po']?>"/>
						
						<div class="form-group">
							<label class="col-sm-2 control-label" >No. Pre Order</label>
							<div class="col-sm-5" style="padding-top: 6px;">
								<?php echo @$detail[0]['no_po']?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Tgl. Pre Order</label>
							<div class="col-sm-5" style="padding-top: 6px;">
								<?php echo @$detail[0]['tgl_po']?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Tgl. Deadline</label>
							<div class="col-sm-5" style="padding-top: 6px;">
								<?php echo @$detail[0]['deadline']?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Status Pre Order</label>
							<div class="col-sm-5" style="padding-top: 6px;">
								<?php echo @$detail[0]['status_po']?>
							</div>
						</div>
						<br/>
						<table class="table table-hover">
							<tr>
								<th>#</th>
								<th style="text-align:center">Nama Produk</th>
								<th style="text-align:center">Jumlah Produk</th>
								<th style="text-align:center">Harga Satuan Produk</th>
								<th style="text-align:center">Harga Produk</th>
							</tr>
							<?php $i=1;?>
							<?php $totalHarga=0;?>
							<?php $jmlProdukHarga=0;?>
							<?php if(@$results):?>
							<?php foreach($results as $row):?>
								<tr>
									<td><?php echo $i++?></td>
									<td style="text-align:center"><?php echo $row['nama_prod'];?></td>
									<td style="text-align:center"><?php echo $row['jumlah_produk'];?></td>
									<td style="text-align:center">
										<?php echo $row['hrg_prod'];?>
									</td>
									<td style="text-align:center">
										<?php 
											$jmlProdukHarga = $row['jumlah_produk'] * $row['hrg_prod'];
											echo $jmlProdukHarga;
											$totalHarga = $totalHarga + $jmlProdukHarga;
										?>
									</td>
								</tr>
							<?php endforeach?>
							<?php else:?>
							<tr>
								<td colspan="5" style="text-align:center">Data Masih Kosong</td>
							</tr>
							<?php endif;?>
							<tr>
								<td colspan="4" style="text-align:right"><b>Total Harga</b></td>
								<td style="text-align:center"><?php echo $totalHarga;?></td>
							</tr>
						</table>
						<?php if(@$detail[0]['persetujuan_po'] == 0):?>
							<input type="submit" name="submit" value="Setuju" class="btn btn-default">
						<?php endif;?>
					</form>
					<?php elseif(@$nilai == 2):?>
						<table class="table table-hover">
							<tr>
								<th>#</th>
								<th>No. Pre Order</th>
								<th>Tgl. Pre Order</th>
								<th>Deadline</th>
								<th>Status PO</th>
								<th>Persetujuan Pelanggan</th>
								<th style="text-align:center">Aksi</th>
							</tr>
							<?php $i=1;?>
							<?php if(@$results):?>
							<?php foreach($results as $row):?>
								<tr>
									<td><?php echo $i++?></td>
									<td><?php echo $row['no_po'];?></td>
									<td><?php echo $row['tgl_po'];?></td>
									<td><?php echo $row['deadline'];?></td>
									<td><?php echo $row['status_po'];?></td>
									<td>
										<?php if($row['persetujuan_po'] == 1):?>
											Telah Disetujui
										<?php else:?>
											Belum Disetujui
										<?php endif;?>
									</td>
									<td style="text-align:center">
										<a href="<?php echo site_url()?>home/persetujuanPO/detail/<?php echo $row['id_po']?>" class="icon-th-list">
											Detail
										</a>
									</td>
								</tr>
							<?php endforeach?>
							<?php else:?>
							<tr>
								<td colspan="8" style="text-align:center">Data Masih Kosong</td>
							</tr>
							<?php endif;?>
						</table>
					<?php elseif(@$nilai == 0):?>
						<div class="alert alert-warning alert-dismissable">
							<b>Warning!</b> Tidak Ada Pemesanan
						</div>
					<?php endif;?>
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