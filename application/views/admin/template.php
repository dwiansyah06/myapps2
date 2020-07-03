<!doctype html>
<html lang="en">

<head>
	<title><?= $judul ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?= base_url().'assets/admin/vendor/bootstrap/css/bootstrap.min.css' ?>">
	<link rel="stylesheet" href="<?= base_url().'assets/admin/vendor/font-awesome/css/font-awesome.min.css' ?>">
	<link rel="stylesheet" href="<?= base_url().'assets/admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css' ?>">
	<link rel="stylesheet" href="<?= base_url().'assets/admin/vendor/linearicons/style.css' ?>">
	<link rel="stylesheet" href="<?= base_url().'assets/admin/vendor/metisMenu/metisMenu.css' ?>">
	<link rel="stylesheet" href="<?= base_url().'assets/admin/vendor/dropify/css/dropify.min.css' ?>">
	<link rel="stylesheet" href="<?= base_url().'assets/admin/vendor/chartist/css/chartist.min.css' ?>">
	<link rel="stylesheet" href="<?= base_url().'assets/admin/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css' ?>">

  <!-- MAIN CSS -->
	<link rel="stylesheet" href="<?= base_url().'assets/admin/css/main.css' ?>">

  <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?= base_url().'assets/admin/css/demo.css' ?>">

  <!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

  <!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url().'assets/admin/img/apple-icon.png' ?>">
	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url().'assets/admin/img/favicon.png' ?>">
</head>

<body>
	<div id="myloading" style="display: none;"></div>
	<div id="wrapper">

		<!-- HEADER -->
		<?= $_header; ?>
		<!-- END HEADER -->

		<!-- LEFT SIDEBAR -->
		<?= $_sidebar ?>
		<!-- END LEFT SIDEBAR -->

		<!-- MAIN CONTENT -->
		<div id="main-content">
			<?= $_content ?>
		</div>
		<!-- END MAIN CONTENT -->

		<!-- FOOTER -->
    <?= $_footer ?>
    <!-- END FOOTER -->

  </div>

	<!-- Javascript -->
	<script type="text/javascript">
		  var BaseUrl = '<?= base_url() ?>';
	</script>
	<script src="<?= base_url().'assets/admin/vendor/jquery/jquery.min.js' ?>"></script>
	<script src="<?= base_url().'assets/admin/vendor/bootstrap/js/bootstrap.min.js' ?>"></script>
	<script src="<?= base_url().'assets/admin/vendor/metisMenu/metisMenu.js' ?>"></script>
	<script src="<?= base_url().'assets/admin/vendor/jquery-slimscroll/jquery.slimscroll.min.js' ?>"></script>
	<script src="<?= base_url().'assets/admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js' ?>"></script>
	<script src="<?= base_url().'assets/admin/vendor/dropify/js/dropify.min.js' ?>"></script>
	<script src="<?= base_url().'assets/admin/vendor/chartist/js/chartist.min.js' ?>"></script>
	<script src="<?= base_url().'assets/admin/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js' ?>"></script>
	<script src="<?= base_url().'assets/admin/scripts/common.js' ?>"></script>
	<script src="<?= base_url().'assets/admin/scripts/process.js' ?>"></script>
	<script type="text/javascript">

	show_guest();
	show_line_graph();

	function show_guest(param){

			var myParam = 100;

			if(param == null){
				myParam = 100;
			}else{
				myParam = param;
			}

			$.ajax({
			    type  : 'ajax',
			    url   : BaseUrl+'admin/get_tamu',
					method:"POST",
			    async : false,
					data  : {"param" : myParam},
					beforeSend:function(){
						 $('#myloading').fadeIn();
					 },
			    dataType : 'json',
			    success : function(data){
			        var html = '';
			        var i;
			        var j;
			        for(i=0; i<data.length; i++){
			            j = i + 1;

			            html += '<tr>'+
			                    '<td class="text-center" width="50">'+j+'</td>'+
			                    '<td>'+data[i].nama_tamu+'</td>'+
			                    '<td width="200">'+data[i].keperluan+'</td>'+
			                    '<td width="200">'+data[i].tujuan+'</td>'+
													'<td class="text-center">'+data[i].no_telp+'</td>'+
													'<td width="200">'+data[i].alamat+'</td>'+
			                    '<td class="text-center" width="150">'+data[i].tanggal+'</td>'+
													'<td class="text-center">'+data[i].tipe_tamu+'</td>';

													if(data[i].status == 0){
							              html += '<td class="text-center"><button onclick="prosesTamu('+data[i].Id+');" class="btn btn-primary btn-sm">Prosess</button></td>';
							            } else {
							              html += '<td class="text-center"><span class="label label-success">Berhasil Di Proses</span></td>';
							            }

							     html += '</tr>';

			        }

			        $('#show_data').html(html);
							$('#myloading').fadeOut();
			    }

			});
	}

	function show_line_graph()
	{
		$.ajax({
				type  : 'ajax',
				url   : BaseUrl+'admin/data_line',
				async : false,
				dataType : 'json',
				success : function(data2){
					var options;

					var data = {
						labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
						series: [
							data2,
						]
					};

					// line chart
					options = {
						height: "300px",
						showPoint: true,
						axisX: {
							showGrid: true,
							offset: 30
						},
						lineSmooth: false,
						high: 100,
					  low: 0,
					  fullWidth: true,
					  axisY: {
					    onlyInteger: true,
					    offset: 30
						},
						showArea: true,
						plugins: [
							Chartist.plugins.tooltip({
								appendToBody: true
							}),
						]
					};

					new Chartist.Line('#demo-line-chart', data, options);
				}

		});

	}

		function prosesTamu(id){
			$.ajax({
				 url: BaseUrl+'admin/proses_tamu',
				 method:"POST",
         data : {"Id" : id},
				 beforeSend:function(){
						$('#myloading').fadeIn();
				 },
				 success:function(){
					 window.alert("Tamu Berhasil di Proses");
					 location.reload();
					 $('#myloading').fadeOut();
				 }
			})
		}

		$(function() {
			$('.dropify').dropify();

			var drEvent = $('#dropify-event').dropify();
			drEvent.on('dropify.beforeClear', function(event, element) {
				return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
			});

			drEvent.on('dropify.afterClear', function(event, element) {
				alert('File deleted');
			});

			$('.dropify-fr').dropify({
				messages: {
					default: 'Glissez-déposez un fichier ici ou cliquez',
					replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
					remove: 'Supprimer',
					error: 'Désolé, le fichier trop volumineux'
				}
			});


		});
	</script>
</body>

</html>
