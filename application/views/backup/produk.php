<?php $this->load->view('header');?>
		<table class="table table-bordered">
			<tr bgcolor="#ccc">
				<th>ID Produk</th>
				<th>Nama Produk</th>
				<th>Harga (Rp)</th>
				<th>Kapasitas</th>
				<th></th>
			</tr>
			<tr>
				<?php $i=1;?>
                    <?php foreach($result->result_array() as $row):?>
                    	<tr> 
                        	<td><?php echo $i++?></td>
							<td><?php echo $row['id_prod'];?></td>
							<td><?php echo $row['nama_prod'];?></td>
							<td><?php echo $row['hrg_prod'];?></td>
							<td><?php echo $row['kapasitas'];?></td>
                            <td> <a href= "<?php echo base_url(); ?>index.php/admin/save_user/<?php echo $row['id_prod'] ?>"><i class="icon-edit"></i> </td>
							
						</tr>
					<?php endforeach?>
				</table>
                <?php else:?>
				<div class="well well-large" align="center">
                	<div class="text-error">Maaf, Data Tidak Ditemukan</div></div>
                <?php endif?>
<?php $this->load->view('footer');?>