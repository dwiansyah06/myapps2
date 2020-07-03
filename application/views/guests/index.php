<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $judul ?></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?= base_url().'assets/css/style.css' ?>" rel="stylesheet">
  </head>
  <body>
    <div id="myloading" style="display: none;"></div>
    <div class="container login-container">
                <div class="row">
                    <div class="col-md-8 login-form-1">
                        <h3>FORM DATA TAMU</h3>
                        <form id="form_umum" method="post">
                            <div class="form-group">
                                <input class="form-control" name="nama" placeholder="Nama Tamu *" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="keperluan" placeholder="Keperluan *" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="tujuan" placeholder="Tujuan *" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <input id="phone_umum" type="number" name="telp" class="form-control" placeholder="No. Telepon *" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <select id="tipe_tamu" class="form-control" name="tamu" required>
                                  <option selected disabled value="">Pilih Tipe Tamu</option>
                                  <option value="UMUM">UMUM</option>
                                  <option value="IAI">IAI</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="alamat" placeholder="Alamat *" style="resize: none" autocomplete="off" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit btn-block" value="Daftar" />
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 login-form-1">
                      <img src="<?= base_url().'assets/admin/img/pom fix.png' ?>" class="mx-auto d-block" style="width: 150px;">
                    </div>
                    <!-- <div class="col-md-6 login-form-2">
                        <h3>IAI</h3>
                        <form id="form_iai" method="post">
                          <div class="form-group">
                              <input class="form-control" name="nama" placeholder="Nama Tamu *" autocomplete="off" required />
                          </div>
                          <div class="form-group">
                              <input class="form-control" name="keperluan" placeholder="Keperluan *" autocomplete="off" required />
                          </div>
                          <div class="form-group">
                              <input class="form-control" name="tujuan" placeholder="Tujuan *" autocomplete="off" required />
                          </div>
                          <div class="form-group">
                              <input id="phone_iai" type="number" name="telp" class="form-control" placeholder="No. Telepon *" autocomplete="off" required />
                          </div>
                          <div class="form-group">
                              <textarea class="form-control" name="alamat" placeholder="Alamat *" style="resize: none" autocomplete="off" required></textarea>
                          </div>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit btn-block" value="Daftar" />
                            </div>
                        </form>
                    </div> -->
                </div>
            </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        var BaseUrl = '<?= base_url() ?>';

        $('#form_umum').on('submit', function(event){
          var phone = $('#phone_umum').val();
          var tamu = $('#tipe_tamu').val();

          if(phone.length < 11 || phone.length > 12){
            window.alert("Maaf nomor hp tidak boleh kurang dari 11 ataupun lebih dari 12");
          } else {
            event.preventDefault();
            $.ajax({
               url: BaseUrl+'guests/input_umum',
               method:"POST",
               data:new FormData(this),
               contentType:false,
               cache:false,
               processData:false,
               beforeSend:function(){
                  $('#myloading').fadeIn();
                },
               success:function(){
                  window.alert("Anda terdaftar sebagai tamu "+tamu+" silahkan menunggu instruksi selanjutnya");
                  location.reload();
                  $('#myloading').fadeOut();
               }
            })
          }
        });

        // $('#form_iai').on('submit', function(event){
        //   var phone = $('#phone_iai').val();
        //   if(phone.length < 11 || phone.length > 12){
        //     window.alert("Maaf nomor hp tidak boleh kurang dari 11 ataupun lebih dari 12");
        //   } else {
        //     event.preventDefault();
        //     $.ajax({
        //        url: BaseUrl+'guests/input_iai',
        //        method:"POST",
        //        data:new FormData(this),
        //        contentType:false,
        //        cache:false,
        //        processData:false,
        //        beforeSend:function(){
        //           $('#myloading').fadeIn();
        //         },
        //        success:function(){
        //           window.alert("Anda terdaftar sebagai tamu IAI silahkan menunggu instruksi selanjutnya");
        //           location.reload();
        //           $('#myloading').fadeOut();
        //        }
        //     })
        //   }
        //
        // });

      });
    </script>
  </body>
</html>
