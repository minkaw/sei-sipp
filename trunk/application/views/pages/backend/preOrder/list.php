<?php $this->load->view('template/backend/layout_header_backend'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manajemen Data
        <small>Pre Order</small>
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
                            <th>Nomor PO</th>
                            <th>Tanggal</th>
							<th>Jumlah</th>
							<th>Total Harga</th>
							<th>Deadline</th>
							<th>Status PO</th>
							<th>Daftar Produk</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
						<?php $i=1;?>
						<?php if(@$results):?>
						<?php foreach($results as $row):?>
							<tr>
								<td><?php echo $i++?></td>
								<td><?php echo $row['no_po'];?></td>
								<td><?php echo $row['tgl_po'];?></td>
								<td><?php echo $row['jml_po'];?></td>
								<td><?php echo $row['totHrg_po'];?></td>
								<td><?php echo $row['deadline'];?></td>
								<td><?php echo $row['status_po'];?></td>
								<td><?php echo $row['daftar_prod'];?></td>
								<td style="text-align:center">
									<a href="<?php echo site_url()?>admin/preOrder/edit/<?php echo $row['no_po']?>" title="Ubah Data">
										<i class="fa fa-edit"></i>
									</a>
									<a href="<?php echo site_url()?>admin/preOrder/delete/<?php echo $row['no_po']?>" title="Hapus Data">
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
                    </table>
                </div><!-- /.box-body -->
                <?php echo $this->pagination->create_links(); ?>
            </div><!-- /.box -->
        </div>
    </div>

</section><!-- /.content -->
<?php $this->load->view('template/backend/layout_footer_backend'); ?>