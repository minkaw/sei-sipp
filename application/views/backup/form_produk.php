<?php $this->load->view('header');?>
	<legend>Form <?php echo $mode; ?></legend>
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/save_user"></br></br>
		<div class="control-group">
		<label class="control-label" for="inputEmail">Id Produk</label>
        <div class="controls">
        <input type="text" name="id_prod" placeholder="Id Produk" value="<?php echo @$detail[0]['id_prod'] ?>">
        <input type="hidden" name="id" value="<?php echo @$detail[0]['id_user'] ?>">
        </div>
        </div>
		<div class="control-group">
		<label class="control-label" for="inputEmail">Nama Produk</label>
        <div class="controls">
        <input type="text" name="nama_prod" placeholder="Nama Produk" value="<?php echo @$detail[0]['nama_prod'] ?>">
        </div>
        </div>
        <div class="control-group">
        <label class="control-label" for="inputPassword">Harga Produk</label>
        <div class="controls">
        <input type="text" name="password" placeholder="Password" value="<?php echo @$detail[0]['password'] ?>">
        </div>
		</div>
		<div class="control-group">
		<label class="control-label" for="inputPassword">Harga Produk</label>
        <div class="controls">
        <input type="text" name="password" placeholder="Password" value="<?php echo @$detail[0]['password'] ?>">
		</div>
		</div>
		<div class="control-group">
		<label class="control-label">Status:</label>
		<div class="controls">
                <label class="radio"><input type="radio" name="status_user" value="ON" checked> ON</label>
     			<label class="radio"><input type="radio" name="status_user" value="OFF"> OFF</label>
		</div>
		</div>
                <br/>
        <div class="control-group">
        <div class="controls">
        <input type="submit" name="submit" class="btn" value="Simpan"/>
        </div>
        </div>
    </form>	
<?php $this->load->view('footer');?>