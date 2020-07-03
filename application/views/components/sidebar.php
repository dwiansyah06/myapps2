<div id="left-sidebar" class="sidebar">
  <button type="button" class="btn btn-xs btn-link btn-toggle-fullwidth">
    <span class="sr-only">Toggle Fullwidth</span>
    <i class="fa fa-angle-left"></i>
  </button>
  <div class="sidebar-scroll">
    <div class="user-account">
      <img src="<?= base_url().'assets/admin/img/admin/'.$user['foto'] ?>" class="img-responsive img-circle user-photo" alt="User Profile Picture">
      <label>Hello, <strong><?= $user['username'] ?></strong></label>
    </div>
    <nav id="left-sidebar-nav" class="sidebar-nav">
      <ul id="main-menu" class="metismenu">
        <li class=""><a href="<?= base_url().'admin/Dashboard' ?>"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
        <li class=""><a href="<?= base_url().'admin/Tamu' ?>"><i class="lnr lnr-users"></i> <span>Tamu</span></a></li>
        <li class=""><a href="<?= base_url().'admin/Laporan' ?>"><i class="lnr lnr-file-empty"></i> <span>Laporan</span></a></li>
        <!-- <li class="">
          <a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="lnr lnr-magic-wand"></i> <span>UI Elements</span></a>
          <ul aria-expanded="true">
            <li class=""><a href="ui-tabs.html">Tabs</a></li>
            <li class=""><a href="ui-buttons.html">Buttons</a></li>
            <li class=""><a href="ui-bootstrap.html">Bootstrap UI</a></li>
            <li class=""><a href="ui-icons.html"><span>Icons</span></a></li>
          </ul>
        </li> -->
      </ul>
    </nav>
  </div>
</div>
