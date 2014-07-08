<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" onclick="location.reload();"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title" id="myModalLabel">Detail Pre Order</h4>
</div>
<div class="modal-body">
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
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload();">Close</button>
</div>