<div class="container-fluid">
  <div class="section-heading">
    <h1 class="page-title">Data Tamu</h1>
  </div>
  <div style="margin-bottom: 30px;">
    <button type="button" onClick="show_guest(1);" class="btn btn-primary btn-sm">Tamu Umum</button>
    <button type="button" onClick="show_guest(0);" class="btn btn-danger btn-sm">Tamu IAI</button>
    <button type="button" onClick="show_guest();" class="btn btn-info btn-sm">Semua Tamu</button>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th class="text-center">No.</th>
          <th class="text-center">Nama</th>
          <th class="text-center">Keperluan</th>
          <th class="text-center">Tujuan</th>
          <th class="text-center">No. Telp</th>
          <th class="text-center">Alamat</th>
          <th class="text-center">Tanggal</th>
          <th class="text-center">Jenis Tamu</th>
          <th class="text-center">Status</th>
        </tr>
      </thead>
      <tbody id="show_data">

      </tbody>
    </table>
  </div>

</div>
