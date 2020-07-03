$(document).ready(function(){

  $('#form-upd-pass').on('submit', function(event){
    event.preventDefault();
    $.ajax({
       url: BaseUrl+'admin/upd_pass',
       method:"POST",
       data:new FormData(this),
       contentType:false,
       cache:false,
       processData:false,
       beforeSend:function(){
          $('#myloading').fadeIn();
        },
       success:function(result){
         var data = JSON.parse(result);
         $('#myloading').fadeOut();
         if (data.hasil == 'fail') {
             $("#myalert").html('<div class="alert alert-danger"><p class="text-left" style="font-size: 12px;"> <span class="fa fa-close"></span> ' + data.error.reject + '</p></div>');
         } else {
           window.alert("Password berhasil diubah");
           location.reload();
         }
       }
    })
  });

  $('#form-upd-profile').on('submit', function(event){
    event.preventDefault();
    $.ajax({
       url: BaseUrl+'admin/upd_profile',
       method:"POST",
       data:new FormData(this),
       contentType:false,
       cache:false,
       processData:false,
       beforeSend:function(){
          $('#myloading').fadeIn();
        },
       success:function(result){
         var data = JSON.parse(result);
         $('#myloading').fadeOut();
         if (data.hasil == 'fail') {
             $("#myalert2").html('<div class="alert alert-danger"><p class="text-left" style="font-size: 12px;"> ' + data.error.not_typical + '</p></div>');
         } else {
           window.alert("Data Berhasil Diperbarui");
           location.reload();
         }
       }
    })
  });

});
