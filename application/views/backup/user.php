<?php $this->load->view('header');?>
		<a href="<?php echo base_url();?>index.php/admin/save_user" class="btn">Tambah Data User</a>
		<?php if(@result):?>
		<table class="table table-bordered">
			<tr bgcolor="#ccc">
				<th>No</th>
				<th>ID</th>
				<th>Username</th>
				<th>Password</th>
				<th>Level</th>
				<th>Last Login</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
			<tr>
                    <?php $i=1;?>
                    <?php foreach($result->result_array() as $row):?>
                    	<tr>
                        	<td><?php echo $i++?></td>
							<td><?php echo $row['id_user'];?></td>
							<td><?php echo $row['username'];?></td>
							<td><?php echo $row['password'];?></td>
							<td><?php echo $row['level'];?></td>
							<td><?php echo $row['last_login'];?></td>
							<td><?php echo $row['status_user'];?></td>
                            <td> <a href= "<?php echo base_url(); ?>index.php/admin/save_user/<?php echo $row['id_user'] ?>"><i class="icon-edit"></i> </td>
							
						</tr>
					<?php endforeach?>
				</table>
                <?php else:?>
				<div class="well well-large" align="center">
                	<div class="text-error">Maaf, Data Tidak Ditemukan</div></div>
                <?php endif?>
<?php $this->load->view('footer');?>