<div class="container-fluid">
  <div class="dashboard-section">
    <div class="section-heading clearfix">
			<h2 class="section-title"><i class="fa fa-pie-chart"></i> Website Analytics</h2>
		</div>

    <div class="panel-content">
			<div class="row">
        <div class="col-md-6 col-sm-6">
					<div class="number-chart">
						<div class="mini-stat">
							<p class="text-muted"><i class="fa fa-user text-success"></i></p>
						</div>
						<div class="number"><span><?= $umum ?></span> <span>Tamu Umum</span></div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="number-chart">
						<div class="mini-stat">
							<p class="text-muted"><i class="fa fa-users text-primary"></i></p>
						</div>
						<div class="number"><span><?= $iai ?></span> <span>Tamu IAI</span></div>
					</div>
				</div>
			</div>
    </div>

    <div class="panel-content">
      <h2 class="heading"><i class="fa fa-square"></i> Grafik Pada Tahun <?= date('Y'); ?></h2>
      <div id="demo-line-chart" class="ct-chart"></div>
    </div>

  </div>

</div>
