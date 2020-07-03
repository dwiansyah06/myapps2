<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-btn">
      <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu"></i></button>
    </div>
    <div class="navbar-brand">
      <img src="<?= base_url().'assets/admin/img/logo.png' ?>">
    </div>
    <div class="navbar-right">
      <div id="navbar-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
              <i class="lnr lnr-cog"></i>
            </a>
            <ul class="dropdown-menu user-menu menu-icon">
              <li class="menu-heading">ACCOUNT SETTINGS</li>
              <li><a href="#" data-toggle="modal" data-target="#modal-upd-profile"><i class="fa fa-fw fa-edit"></i> <span>Update Profile</span></a></li>
              <li><a href="#" data-toggle="modal" data-target="#modal-upd-pass"><i class="fa fa-fw fa-lock"></i> <span>Update Password</span></a></li>
              <li><a href="<?= base_url().'admin/logout' ?>"><i class="fa fa-fw fa-sign-out"></i> <span>Sign Out</span></a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
