<div class="clearfix"></div>
<div id="modal-upd-profile" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Update Data Profile</h4>
			</div>
			<form id="form-upd-profile" method="post">
				<div class="modal-body">
					<div id="myalert2"></div>
					<div class="row">
	          <div class="col-md-6">
	            <div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input class="form-control" placeholder="Username" name="username" value="<?= $user['username']; ?>" autocomplete="off" required>
									<input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user'); ?>">
									<input type="hidden" name="foto_lama" value="<?= $user['foto']; ?>">
							</div>
							<div class="panel-content">
								<input type="file" name="foto_baru" class="dropify">
							</div>
	          </div>
						<div class="col-md-6">
							<center><img src="<?= base_url().'assets/admin/img/admin/'.$user['foto'] ?>" class="img-responsive img-circle user-photo" alt="User Profile Picture"></center>
						</div>
	        </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="modal-upd-pass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel2">Update Password</h4>
			</div>
			<form id="form-upd-pass" method="post">
				<div class="modal-body">
					<div id="myalert"></div>
					<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock"></i></span>
							<input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user'); ?>">
							<input class="form-control input-sm" name="pass_lama" placeholder="Password Lama" type="password" required>
					</div>
					<br>
					<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock"></i></span>
							<input class="form-control input-sm" name="pass_baru" placeholder="Password Baru" type="password" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-block btn-sm"><i class="fa fa-check-circle"></i> Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<footer>
  <p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
</footer>
