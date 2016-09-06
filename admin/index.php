<?php
session_start();
error_reporting(0);
if (isset($_SESSION['level']))
	{
		 if ($_SESSION['level'] == "1")
		   {

		   }
		   else if ($_SESSION['level'] == "2")
		   {
		       header('location:../user/');
		   }
	}
else if (!isset($_SESSION['level']))
{
	header('location:../index.php');
}

  	include("../koneksi.php");
?>
<!DOCTYPE html>
<html>

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/plugins/steps/jquery.steps.css" rel="stylesheet">
      <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
      <link href="../css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
      <link href="../css/plugins/dropzone/basic.css" rel="stylesheet">
      <link href="../css/plugins/dropzone/dropzone.css" rel="stylesheet">
      <!-- Data Tables -->
      <link href="../css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
      <link href="../css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
      <link href="../css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
      <link href="../css/plugins/datapicker/datepicker3.css" rel="stylesheet">
      <link href="../css/animate.css" rel="stylesheet">
      <link href="../css/style.css" rel="stylesheet">
      <link href="../css/plugins/iCheck/custom.css" rel="stylesheet">

			<!-- Date -->
				<link href="../css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
				<link href="../css/plugins/datapicker/datepicker3.css" rel="stylesheet">
				<link href="../css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
				<link href="../css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

			<script src="../js/jquery-2.1.1.js"></script>
</head>

	    <title>Penjualan</title>
<body>
    <div id="wrapper">
			<nav class="navbar-default navbar-static-side" role="navigation">
			    <div class="sidebar-collapse">
			        <ul class="nav" id="side-menu">
			            <li class="nav-header">
			                <div class="dropdown profile-element"> <span>
			                        <img alt="image" class="img-circle" src="../img/tasya.jpg" />
			                         </span>
			                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
			                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Administrator</strong>
			                        </span> <span class="text-muted text-xs block">Manager<b class="caret"></b></span> </span> </a>
			                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
			                        <li><a href="logout.php">Logout</a></li>
			                    </ul>
			                </div>
			                <div class="logo-element">
			                    IN+
			                </div>
			            </li>
                  <li>
			                <a href="index?page=home"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>
			            </li>
                  <li>
			                <a href="index?page=transaksi"><i class="fa fa-exchange"></i> <span class="nav-label">Transaksi Penjualan</span></a>
			            </li>
                  <li>
			                <a href="index?page=barang"><i class="fa fa-folder-o"></i> <span class="nav-label">Master Barang</span></a>
			            </li>
                  <li>
			                <a href="index?page=supplier"><i class="fa fa-check-square-o"></i> <span class="nav-label">Supplier</span></a>
			            </li>
				            <li>
			                <a href="#"><i class="fa fa-stack-overflow"></i> <span class="nav-label">Laporan</span><span class="fa arrow"></span></a>
				                <ul class="nav nav-second-level">
				                    <li><a href="index?page=laporan_pembelian">Pembelian</a></li>
				                    <li><a href="index?page=laporan_penjualan">Penjualan</a></li>
												</ul>
			            </li>
				            <li>
			                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Chart</span><span class="fa arrow"></span></a>
				                <ul class="nav nav-second-level">
				                    <li><a href="index?page=chart_penjualan">Penjualan</a></li>
				                    <li><a href="index?page=chart_stok">Stok Barang</a></li>
												</ul>
			            </li>
			    </div>
			</nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to Administrator</span>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
				<div class="row wrapper border-bottom white-bg page-heading">
				    <div class="col-lg-10">
				        <h2>Administrator</h2>
				    </div>
				    <div class="col-lg-2">

				    </div>
				</div>
            <?php
              if (@$_GET['page'] != "")
              {
                include(@$_GET['page'].".php");
              }
              else
              {
                include("home.php");
              }
            ?>
        <div class="wrapper wrapper-content animated fadeInRight">

        </div>
        <div class="footer">
            <div class="pull-right">
							  <strong>Copyright</strong> &copy; <?php echo date("Y") ?>. <a href="https://www.facebook.com/lustriaebis">Lustria Ebis</a>
            </div>
            <div>

            </div>
        </div>

        </div>
        </div>

				<script src="../js/bootstrap.min.js"></script>
		    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
		    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		    <script src="../js/plugins/jeditable/jquery.jeditable.js"></script>

		    <!-- Data Tables -->
		    <script src="../js/plugins/dataTables/jquery.dataTables.js"></script>
		    <script src="../js/plugins/dataTables/dataTables.bootstrap.js"></script>
		    <script src="../js/plugins/dataTables/dataTables.responsive.js"></script>
		    <script src="../js/plugins/dataTables/dataTables.tableTools.min.js"></script>

				<script src="../js/plugins/dropzone/dropzone.js"></script>

		    <!-- Custom and plugin javascript -->
		    <script src="../js/inspinia.js"></script>
		    <script src="../js/plugins/pace/pace.min.js"></script>

				<!-- Steps -->
				<script src="../js/plugins/staps/jquery.steps.min.js"></script>

				<!-- Jquery Validate -->
				<script src="../js/plugins/validate/jquery.validate.min.js"></script>
		    <!-- Page-Level Scripts -->

				<!-- blueimp gallery -->
				<script src="../js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

				<script src="../js/plugins/chosen/chosen.jquery.js"></script>

				<!-- JSKnob -->
				<script src="../js/plugins/jsKnob/jquery.knob.js"></script>

				<!-- Input Mask-->
				<script src="../js/plugins/jasny/jasny-bootstrap.min.js"></script>

				<!-- Data picker -->
				<script src="../js/plugins/datapicker/bootstrap-datepicker.js"></script>

				<!-- NouSlider -->
				<script src="../js/plugins/nouslider/jquery.nouislider.min.js"></script>

				<!-- Switchery -->
				<script src="../js/plugins/switchery/switchery.js"></script>

				<!-- IonRangeSlider -->
				<script src="../js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

				<!-- iCheck -->
				<script src="../js/plugins/iCheck/icheck.min.js"></script>

				<!-- MENU -->
				<script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>

				<!-- Color picker -->
				<script src="../js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

				<!-- Image cropper -->
				<script src="../js/plugins/cropper/cropper.min.js"></script>

		    <script>
		        $(document).ready(function() {
		            $('.dataTables-example').dataTable({
		                responsive: true,
		                "dom": 'T<"clear">lfrtip',
		                "tableTools": {
		                    "sSwfPath": "../js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
		                }
		            });

		            /* Init DataTables */
		            var oTable = $('#editable').dataTable();

		            /* Apply the jEditable handlers to the table */
		            oTable.$('td').editable( '../example_ajax.php', {
		                "callback": function( sValue, y ) {
		                    var aPos = oTable.fnGetPosition( this );
		                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
		                },
		                "submitdata": function ( value, settings ) {
		                    return {
		                        "row_id": this.parentNode.getAttribute('id'),
		                        "column": oTable.fnGetPosition( this )[2]
		                    };
		                },

		                "width": "90%",
		                "height": "100%"
		            } );


		        });

		        function fnClickAddRow() {
		            $('#editable').dataTable().fnAddData( [
		                "Custom row",
		                "New row",
		                "New row",
		                "New row",
		                "New row" ] );

		        }
		    </script>

		    <script>
		        $(document).ready(function(){
		            $('.i-checks').iCheck({
		                checkboxClass: 'icheckbox_square-green',
		                radioClass: 'iradio_square-green',
		            });
		        });

						$(document).ready(function(){
								$("#wizard").steps();
								$("#form").steps({
										bodyTag: "fieldset",
										onStepChanging: function (event, currentIndex, newIndex)
										{
												// Always allow going backward even if the current step contains invalid fields!
												if (currentIndex > newIndex)
												{
														return true;
												}

												// Forbid suppressing "Warning" step if the user is to young
												if (newIndex === 3 && Number($("#age").val()) < 18)
												{
														return false;
												}

												var form = $(this);

												// Clean up if user went backward before
												if (currentIndex < newIndex)
												{
														// To remove error styles
														$(".body:eq(" + newIndex + ") label.error", form).remove();
														$(".body:eq(" + newIndex + ") .error", form).removeClass("error");
												}

												// Disable validation on fields that are disabled or hidden.
												form.validate().settings.ignore = ":disabled,:hidden";

												// Start validation; Prevent going forward if false
												return form.valid();
										},
										onStepChanged: function (event, currentIndex, priorIndex)
										{
												// Suppress (skip) "Warning" step if the user is old enough.
												if (currentIndex === 2 && Number($("#age").val()) >= 18)
												{
														$(this).steps("next");
												}

												// Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
												if (currentIndex === 2 && priorIndex === 3)
												{
														$(this).steps("previous");
												}
										},
										onFinishing: function (event, currentIndex)
										{
												var form = $(this);

												// Disable validation on fields that are disabled.
												// At this point it's recommended to do an overall check (mean ignoring only disabled fields)
												form.validate().settings.ignore = ":disabled";

												// Start validation; Prevent form submission if false
												return form.valid();
										},
										onFinished: function (event, currentIndex)
										{
												var form = $(this);

												// Submit form input
												form.submit();
										}
								}).validate({
														errorPlacement: function (error, element)
														{
																element.before(error);
														},
														rules: {
																confirm: {
																		equalTo: "#password"
																}
														}
												});
					 });
		    </script>

				<script>
		        $(document).ready(function(){

		            Dropzone.options.myAwesomeDropzone = {

		                autoProcessQueue: false,
		                uploadMultiple: true,
		                parallelUploads: 100,
		                maxFiles: 100,

		                // Dropzone settings
		                init: function() {
		                    var myDropzone = this;

		                    this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
		                        e.preventDefault();
		                        e.stopPropagation();
		                        myDropzone.processQueue();
		                    });
		                    this.on("sendingmultiple", function() {
		                    });
		                    this.on("successmultiple", function(files, response) {
		                    });
		                    this.on("errormultiple", function(files, response) {
		                    });
		                }

		            }

		       });
		    </script>

				<script>
			$(document).ready(function(){

					var $image = $(".image-crop > img")
					$($image).cropper({
							aspectRatio: 1.618,
							preview: ".img-preview",
							done: function(data) {
									// Output the result data for cropping image.
							}
					});

					var $inputImage = $("#inputImage");
					if (window.FileReader) {
							$inputImage.change(function() {
									var fileReader = new FileReader(),
													files = this.files,
													file;

									if (!files.length) {
											return;
									}

									file = files[0];

									if (/^image\/\w+$/.test(file.type)) {
											fileReader.readAsDataURL(file);
											fileReader.onload = function () {
													$inputImage.val("");
													$image.cropper("reset", true).cropper("replace", this.result);
											};
									} else {
											showMessage("Please choose an image file.");
									}
							});
					} else {
							$inputImage.addClass("hide");
					}


					$('#data_1 .input-group.date').datepicker({
							todayBtn: "linked",
							keyboardNavigation: false,
							forceParse: false,
							calendarWeeks: true,
							autoclose: true
					});

					$('#data_2 .input-group.date').datepicker({
							startView: 1,
							todayBtn: "linked",
							keyboardNavigation: false,
							forceParse: false,
							autoclose: true
					});

					$('#data_3 .input-group.date').datepicker({
							startView: 2,
							todayBtn: "linked",
							keyboardNavigation: false,
							forceParse: false,
							autoclose: true
					});

					$('#data_4 .input-group.date').datepicker({
							minViewMode: 1,
							keyboardNavigation: false,
							forceParse: false,
							autoclose: true,
							todayHighlight: true
					});

					$('#data_5 .input-daterange').datepicker({
							keyboardNavigation: false,
							forceParse: false,
							autoclose: true
					});

					var elem = document.querySelector('.js-switch');
					var switchery = new Switchery(elem, { color: '#1AB394' });

					var elem_2 = document.querySelector('.js-switch_2');
					var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });

					var elem_3 = document.querySelector('.js-switch_3');
					var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

					$('.i-checks').iCheck({
							checkboxClass: 'icheckbox_square-green',
							radioClass: 'iradio_square-green',
					});

					$('.demo1').colorpicker();

					var divStyle = $('.back-change')[0].style;
					$('#demo_apidemo').colorpicker({
							color: divStyle.backgroundColor
					}).on('changeColor', function(ev) {
											divStyle.backgroundColor = ev.color.toHex();
									});


			});
			var config = {
							'.chosen-select'           : {},
							'.chosen-select-deselect'  : {allow_single_deselect:true},
							'.chosen-select-no-single' : {disable_search_threshold:10},
							'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
							'.chosen-select-width'     : {width:"95%"}
					}
					for (var selector in config) {
							$(selector).chosen(config[selector]);
					}

			$("#ionrange_1").ionRangeSlider({
					min: 0,
					max: 5000,
					type: 'double',
					prefix: "$",
					maxPostfix: "+",
					prettify: false,
					hasGrid: true
			});

			$("#ionrange_2").ionRangeSlider({
					min: 0,
					max: 10,
					type: 'single',
					step: 0.1,
					postfix: " carats",
					prettify: false,
					hasGrid: true
			});

			$("#ionrange_3").ionRangeSlider({
					min: -50,
					max: 50,
					from: 0,
					postfix: "°",
					prettify: false,
					hasGrid: true
			});

			$("#ionrange_4").ionRangeSlider({
					values: [
							"January", "February", "March",
							"April", "May", "June",
							"July", "August", "September",
							"October", "November", "December"
					],
					type: 'single',
					hasGrid: true
			});

			$("#ionrange_5").ionRangeSlider({
					min: 10000,
					max: 100000,
					step: 100,
					postfix: " km",
					from: 55000,
					hideMinMax: true,
					hideFromTo: false
			});



		</script>

		<style>
		    body.DTTT_Print {
		        background: #fff;

		    }
		    .DTTT_Print #page-wrapper {
		        margin: 0;
		        background:#fff;
		    }

		    button.DTTT_button, div.DTTT_button, a.DTTT_button {
		        border: 1px solid #e7eaec;
		        background: #fff;
		        color: #676a6c;
		        box-shadow: none;
		        padding: 6px 8px;
		    }
		    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
		        border: 1px solid #d2d2d2;
		        background: #fff;
		        color: #676a6c;
		        box-shadow: none;
		        padding: 6px 8px;
		    }

		    .dataTables_filter label {
		        margin-right: 5px;

		    }
		</style>
</body>

</html>
