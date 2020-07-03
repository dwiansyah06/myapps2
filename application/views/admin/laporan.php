<div class="container-fluid">
  <div class="section-heading">
    <h1 class="page-title">Laporan Data Tamu</h1>
  </div>

  <form action="<?= base_url().'admin/Result' ?>" method="post">
    <div class="row">
      <div class="col-md-6">
        <label>Range Tanggal</label>
        <br>
        <div class="input-daterange input-group" data-provide="datepicker">
          <input type="text" class="input-sm form-control" name="start" autocomplete="off" required>
          <span class="input-group-addon">to</span>
          <input type="text" class="input-sm form-control" name="end" autocomplete="off" required>
        </div>
      </div>
      <div class="col-md-6">
        <label>Status Data</label>
        <br>
        <select class="form-control input-sm" name="jenis_tamu" required>
            <option selected disabled value="">Pilih Tipe Tamu</option>
            <option value="all">Semua Tamu</option>
            <option value="IAI">IAI</option>
            <option value="UMUM">Umum</option>
          </select>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary btn-sm btn-block" style="margin-top: 20px;" >Process</button>
      </div>
    </div>
  </form>


</div>
