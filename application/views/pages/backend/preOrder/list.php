<?php $this->load->view('template/backend/layout_header_backend'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Pre Order
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manajemen Data</li>
        <li class="active">Pre Order</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->load->view('template/backend/layout_alert'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <h3>Daftar Pre Order</h3>
						<a href="<?php echo base_url('admin/preOrder/add') ?>" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="box-tools">
						<form role="form" action="<?php echo site_url() ?>admin/preOrder/searchData"  method="post">
                        <div class="input-group">
							<input type="text" name="name" class="form-control input-sm pull-right" style="width: 240px;" placeholder="Search"/>
							<div class="input-group-btn">
								<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
							</div>
                        </div>
						</form>
                    </div>
					
                </div><!-- /.box-header -->
				
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th>No. Pre Order</th>
                            <th>No. Pelanggan</th>
                            <th>Tgl. Pre Order</th>
							<th>Deadline</th>
							<th>Status PO</th>
							<th>Persetujuan Pelanggan</th>
							<th style="text-align:center">Detail Pre Order</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
						<?php $i=1;?>
						<?php if(@$results):?>
						<?php foreach($results as $row):?>
							<tr>
								<td><?php echo $i++?></td>
								<td><?php echo $row['no_po'];?></td>
								<td><?php echo $row['no_pelanggan'];?></td>
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
									<a href="<?php echo base_url('admin/detailPreOrder/dtlPreOrder/'. $row['id_po']) ?>" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal" data-backdrop="static" 
   data-keyboard="false"><i class="fa fa-shopping-cart"></i></a>
									
									<?php if($row['status_po'] != 'Finish'):?>
										<a href="<?php echo base_url('admin/detailPreOrder/formDtlPreOrder/'. $row['id_po']) ?>" class="btn btn-sm btn-success" >
											<i class="fa fa-plus-square"></i>
										</a>
									<?php endif;?>
								</td>
								<td style="text-align:center">
									<a href="<?php echo site_url()?>admin/preOrder/edit/<?php echo $row['id_po']?>" title="Ubah Data">
										<i class="fa fa-edit"></i>
									</a>
									<a href="<?php echo site_url()?>admin/preOrder/delete/<?php echo $row['id_po']?>" title="Hapus Data">
										<i class="fa fa-times"></i>
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
                </div><!-- /.box-body -->
                <?php echo $this->pagination->create_links(); ?>
            </div><!-- /.box -->
        </div>
    </div>
	<?php $this->load->view('template/backend/config/modalPopup'); ?>
</section><!-- /.content -->
<?php $this->load->view('template/backend/layout_footer_backend'); ?>