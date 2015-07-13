<div class="container">
	<div class="row">
		<div class="col-lg-4">
		</div>
		<div class="col-lg-4">
			<h2>&nbsp;</h2>
			<h2>
				RTN <small>Admin Login</small>
			</h2>
			<?php if(isset($_GET['wrong'])) { ?>
				<div class="alert alert-danger alert-dismissable">
	              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">!</button>
	              Incorrect Username and/or Password! Please Check!
	            </div>
            <?php } ?>
			<form role="form" method="POST" action="<?php echo base_url('__admin/authenticate'); ?>">
				<div class="form-group">
					<label>
                        User Name
                        <input type="text" id="userName" name="userName" class="form-control">
                    </label>
				</div>
				<div class="form-group">
					<label>
                        Password
                        <input type="password" id="password" name="password" class="form-control">
                    </label>
				</div>
				<button type="submit" class="btn btn-default">Login</button>
			</form>
		</div>
	</div>
	<!-- /.row -->
</div>