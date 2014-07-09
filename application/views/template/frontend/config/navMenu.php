<nav id="mainmenu" class="mainmenu">
	<ul>
		<li class="logo-wrapper"><img src="<?php echo base_url('assets/logo-sei.png') ?>" style=" height: 70px; "/></li>
		<li class="active">
			<a href="<?php echo base_url('home/dashboard') ?>">Home</a>
		</li>
		<li>
			<a href="<?php echo base_url('home/product') ?>">Our Product</a>
		</li>
		<li>
			<a href="<?php echo base_url('home/client') ?>">Our Client</a>
		</li>
		<?php if($this->session->userdata('usernamePelanggan')): ?>
		<li class="has-submenu">
			<a href="#">Control Panel +</a>
			<div class="mainmenu-submenu">
				<div class="mainmenu-submenu-inner"> 
					<div>
						<h4>Homepage</h4>
						<ul>
							<li><a href="<?php echo base_url('home/uploadPengajuan') ?>">Upload Pengajuan Pesanan</a></li>
							<li><a href="<?php echo base_url('home/persetujuanPO') ?>">Persetujuan Pre Order</a></li>
						</ul>
					</div>
					<div>
						<h4>Produk</h4>
						<ul>
							<li><a href="<?php echo base_url('home/daftarPO') ?>">Daftar Produk</a></li>
						</ul>
					</div>
				</div><!-- /mainmenu-submenu-inner -->
			</div><!-- /mainmenu-submenu -->
		</li>
		<?php endif;?>
		<li>
			<a href="<?php echo base_url('home/aboutUs') ?>">About us</a>
		</li>
	</ul>
</nav>