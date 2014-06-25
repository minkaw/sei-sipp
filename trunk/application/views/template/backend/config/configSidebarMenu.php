<?php 
	$activeDasboard = '';
	$activeManajemen = '';
	$activeReg = '';

	if($menu == 'Dashboard'){
		$activeDasboard = 'active';
	}else if($menu == 'Manajemen'){
		$activeManajemen = 'active';
	}
?>

<li class="<?php echo $activeDasboard ?>">
	<a href="<?php echo base_url('admin/home') ?>">
		<i class="fa fa-dashboard"></i> <span>Dashboard</span>
	</a>
</li>
<li class="<?php echo $activeReg ?>">
	<a href="#">
		<i class="fa fa-share-square-o"></i> <span>Pre Order</span>
	</a>
</li>
<li class="<?php echo $activeReg ?>">
	<a href="#">
		<i class="fa fa-shopping-cart"></i> <span>Penjualan</span>
	</a>
</li>
<li class="<?php echo $activeReg ?>">
	<a href="#">
		<i class="fa fa-gears"></i> <span>Aktivitas</span>
	</a>
</li>
<li class="treeview <?php echo $activeManajemen ?>">
	<a href="#">
		<i class="fa fa-table"></i> <span>Manajemen Data</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
		<li><a href="<?php echo base_url('admin/produk') ?>"><i class="fa fa-angle-double-right"></i> Produk</a></li>
		<li><a href="<?php echo base_url('admin/pelanggan') ?>"><i class="fa fa-angle-double-right"></i> Pelanggan</a></li>
		<li><a href="<?php echo base_url('admin/accountManager') ?>"><i class="fa fa-angle-double-right"></i> Account Manager</a></li>
		<li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-angle-double-right"></i> User</a></li>
	</ul>
</li>