<?php $this->load->view('template/backend/layout_header_backend'); ?>
<!-- content Header (Page header) -->
<section class="content-header">
    <h1>
        Pre Order
        <small>Detail Pre Order</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pre Order</li>
        <li class="active">Detail Pre Order</li>
        <li class="active">Form</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <form class="form-horizontal" method="post" actiON="<?php echo base_url();?>admin/detailPreOrder/save" ONsubmit="return preOrder()"></br></br>
		<input type="hidden" name="id_detail_po" value="<?php echo @$detail[0]['id_detail_po']?>"/>
		<input type="hidden" name="id_po" value="<?php echo @$idPo ?>"/>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Produk</label>
			<div class="col-sm-3">
				<select class="form-control" name="id_prod">
					<option value=""> -- </option>
					<?php if (@$comboProduk):?>
						<?php foreach ($comboProduk as $row):?>
							<?php if ($row['id_prod'] == @$detail[0]['id_prod']):?>
								<?php $selected =  'selected="selected"' ?>
							<?php else :?>
								<?php $selected =  '' ?>
							<?php endif;?>
							<option value="<?php echo $row['id_prod'] ?>" <?php echo $selected ?> ><?php echo $row['nama_prod'] ?></option>
						<?php endforeach?>
					<?php endif?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >Jumlah Produk</label>
			<div class="col-sm-3">
				<input class="form-control" type="number" id="jumlah_produk" name="jumlah_produk" value="<?php echo @$detail[0]['jumlah_produk']?>"/>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" name="submit" value="Simpan" class="btn btn-default">
				<a href="<?php echo base_url('admin/preOrder') ?>" class="btn btn-primary">Batal</a>
			</div>
		</div>
    </form>
	<br/>
	<div class="row">
        <div class="col-xs-12">
            <div class="box">
				
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th style="text-align:center">Nama Produk</th>
                            <th style="text-align:center">Jumlah Produk</th>
                            <th style="text-align:center">Harga Satuan Produk</th>
                            <th style="text-align:center">Harga Produk</th>
                            <th style="text-align:center">Aksi</th>
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
								<td style="text-align:center">
									<a href="<?php echo site_url()?>admin/detailPreOrder/edit/<?php echo $row['id_po']?>/<?php echo $row['id_detail_po']?>" title="Ubah Data">
										<i class="fa fa-edit"></i>
									</a>
									<a href="<?php echo site_url()?>admin/detailPreOrder/delete/<?php echo $row['id_po']?>/<?php echo $row['id_detail_po']?>" title="Hapus Data">
										<i class="fa fa-times"></i>
									</a>
								</td>
							</tr>
						<?php endforeach?>
						<?php else:?>
						<tr>
							<td colspan="6" style="text-align:center">Data Masih Kosong</td>
						</tr>
						<?php endif;?>
						<tr>
							<td colspan="4" style="text-align:right"><b>Total Harga</b></td>
							<td style="text-align:center"><?php echo $totalHarga;?></td>
							<td>&nbsp;</td>
						</tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
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