<?php $this->load->view('template/backend/layout_header_backend'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manajemen Surat
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manajemen Data</li>
        <li class="active">Manajemen Surat</li>
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
                        <h3>Daftar Manajemen Surat</h3>
						<a href="<?php echo base_url('admin/manajemenSurat/add') ?>" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="box-tools">
						<form role="form" action="<?php echo site_url() ?>admin/manajemenSurat/searchData"  method="post">
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
                            <th>Nama File</th>
							<th>Status Surat</th>
							<th>Nama AM</th>
							<th>Keterangan</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
						<?php $i=1;?>
						<?php if(@$results):?>
						<?php foreach($results as $row):?>
							<tr>
								<td><?php echo $i++?></td>
								<td><?php echo $row['nama_file'];?></td>
								<td><?php echo $row['status_surat'];?></td>
								<td><?php echo $row['nama_am'];?></td>
								<td><?php echo $row['keterangan'];?></td>
								<td style="text-align:center">
									<a href="<?php echo site_url()?>admin/manajemenSurat/edit/<?php echo $row['id_surat']?>" title="Ubah Data">
										<i class="fa fa-edit"></i>
									</a>
									<a href="<?php echo site_url()?>admin/manajemenSurat/delete/<?php echo $row['id_surat']?>" title="Hapus Data">
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