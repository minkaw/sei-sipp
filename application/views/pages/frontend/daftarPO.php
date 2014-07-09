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
					<table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th>No. Produk</th>
                            <th>Nama Produk</th>
							<th>Harga (Rp)</th>
							<th>Kapasitas (Wp)</th>
                        </tr>
						<?php $i=1;?>
						<?php if(@$results):?>
						<?php foreach($results as $row):?>
							<tr>
								<td><?php echo $i++?></td>
								<td><?php echo $row['no_prod'];?></td>
								<td><?php echo $row['nama_prod'];?></td>
								<td><?php echo $row['hrg_prod'];?></td>
								<td><?php echo $row['kapasitas'];?></td>
							</tr>
						<?php endforeach?>
						<?php else:?>
						<tr>
							<td colspan="6" style="text-align:center">Data Masih Kosong</td>
						</tr>
						<?php endif;?>
                    </table>
					<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('template/frontend/layout_footer_frontend')?>