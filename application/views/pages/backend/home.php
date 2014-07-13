<?php $this->load->view('template/backend/layout_header_backend');?>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<section class="col-lg-6"> 
				   
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs pull-right">
					<li class="pull-left header"><i class="fa fa-inbox"></i> Pre Order</li>
				</ul>
				<div class="tab-content no-padding">
					<div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
				</div>
			</div>
			
		</section>
		<section class="col-lg-6">
			<div class="box box-danger" id="loading-example">
				<div class="box-header">
					<div class="box-title">
						<h4><i class="fa fa-inbox"></i> &nbsp;Penjualan</h4>
					</div>
				</div>
				<div class="box-body no-padding">
					<div class="row">
						<div class="col-sm-12">
							<div class="chart" id="bar-chart" style="height: 250px;"></div>
						</div>
					</div>
				</div>
			</div>

		</section>
	</div>
</section>
<?php $this->load->view('template/backend/layout_footer_backend');?>