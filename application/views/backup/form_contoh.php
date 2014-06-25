<?php $this->load->view('header');?>
        <form class="form-horizontal">
        <div class="control-group">
        <label class="control-label" for="inputEmail">Email</label>
        <div class="controls">
        <input type="text" id="inputEmail" placeholder="Email">
        </div>
        </div>
        <div class="control-group">
        <label class="control-label" for="inputPassword">Password</label>
        <div class="controls">
        <input type="password" id="inputPassword" placeholder="Password">
        </div>
        </div>
        <div class="control-group">
        <div class="controls">
        <label class="checkbox">
        <input type="checkbox"> Remember me
        </label>
        <button type="submit" class="btn">Sign in</button>
        </div>
        </div>
        </form>
		
		<table class="table table-bordered">
			<tr bgcolor="#ccc">
				<th>No</th>
				<th>Nama</th>
				<th>Aksi</th>
			</tr>
			<tr>
				<th>1.</th>
				<th>Aulia</th>
				<th><a href="">Edit</a></th>
			</tr>
		</table>	
<?php $this->load->view('footer');?>