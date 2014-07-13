<?php $this->load->view('template/backend/layout_header_backend'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Penjualan
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manajemen Data</li>
        <li class="active">Penjualan</li>
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
                        <h3>Daftar Penjualan</h3>
                    </div>
                    <div class="box-tools">
						<form role="form" action="<?php echo site_url() ?>admin/penjualan/searchData"  method="post">
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
							<th>Status Pre Order</th>
                            <th>No. Penjualan</th>
                            <th>Tgl. Penjualan</th>
							<th>Status Penjualan</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
						<?php $i=1;?>
						<?php if(@$results):?>
						<?php foreach($results as $row):?>
							<tr>
								<td><?php echo $i++?></td>
								<td><?php echo $row['no_po'];?></td>
								<td><?php echo $row['status_po'];?></td>
								<td><?php echo $row['no_penj'];?></td>
								<td><?php echo $row['tgl_penj'];?></td>
								<td>
									<?php if($row['status_penjualan'] == 1):?>
										Telah Terjual
									<?php else:?>
										Belum Terjual
									<?php endif;?>
								</td>
								<td style="text-align:center">
									<a href="<?php echo site_url()?>admin/penjualan/edit/<?php echo $row['id_po']?>" title="Ubah Data">
										<i class="fa fa-edit"></i>
									</a>
								</td>
							</tr>
						<?php endforeach?>
						<?php else:?>
						<tr>
							<td colspan="7" style="text-align:center">Data Masih Kosong</td>
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