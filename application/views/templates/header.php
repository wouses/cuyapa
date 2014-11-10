<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title><?php echo $titulo; ?></title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/bootstrap-responsive.min.css">
	<!-- jQuery UI -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/plugins/jquery-ui/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
	<!-- PageGuide -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/plugins/pageguide/pageguide.css">
	<!-- Fullcalendar -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/plugins/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/plugins/fullcalendar/fullcalendar.print.css" media="print">
	<!-- Tagsinput -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/plugins/tagsinput/jquery.tagsinput.css">
	<!-- chosen -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/plugins/chosen/chosen.css">
	<!-- multi select -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/plugins/multiselect/multi-select.css">
	<!-- timepicker -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/plugins/timepicker/bootstrap-timepicker.min.css">
	<!-- colorpicker -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/plugins/colorpicker/colorpicker.css">
	<!-- Datepicker -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/plugins/datepicker/datepicker.css">
	<!-- Plupload -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/plugins/plupload/jquery.plupload.queue.css">
	<!-- select2 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/plugins/select2/select2.css">
	<!-- icheck -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/themes.css">
	<!-- dataTables -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/back-end/plugins/datatable/TableTools.css">


	<!-- Functions -->
	<script src="<?php echo base_url(); ?>js/back-end/functions.js"></script>
    
    <!-- validations -->
	<script src="<?php echo base_url(); ?>js/back-end/validations.js"></script>

	<!-- jQuery -->
	<script src="<?php echo base_url(); ?>js/back-end/jquery.min.js"></script>
	
	<!-- Nice Scroll -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- imagesLoaded -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
	<!-- jQuery UI -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/jquery-ui/jquery.ui.core.min.js"></script>
	<script src="<?php echo base_url(); ?>js/back-end/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<script src="<?php echo base_url(); ?>js/back-end/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
	<script src="<?php echo base_url(); ?>js/back-end/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
	<script src="<?php echo base_url(); ?>js/back-end/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
	<script src="<?php echo base_url(); ?>js/back-end/plugins/jquery-ui/jquery.ui.spinner.js"></script>
	<script src="<?php echo base_url(); ?>js/back-end/plugins/jquery-ui/jquery.ui.slider.js"></script>
	<!-- slimScroll -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url(); ?>js/back-end/bootstrap.min.js"></script>
	<!-- Bootbox -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/bootbox/jquery.bootbox.js"></script>
	<!-- Form -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/form/jquery.form.min.js"></script>
	<!-- Masked inputs -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/maskedinput/jquery.maskedinput.min.js"></script>
	<!-- TagsInput -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/tagsinput/jquery.tagsinput.min.js"></script>
	<!-- Datepicker -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/datepicker/bootstrap-datepicker.js"></script>
	<!-- Timepicker -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/timepicker/bootstrap-timepicker.min.js"></script>
	<!-- Colorpicker -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/colorpicker/bootstrap-colorpicker.js"></script>
    <!-- dataTables -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>js/back-end/plugins/datatable/TableTools.min.js"></script>
	<script src="<?php echo base_url(); ?>js/back-end/plugins/datatable/ColReorder.min.js"></script>
	<script src="<?php echo base_url(); ?>js/back-end/plugins/datatable/ColReorderWithResize.js"></script>
	<script src="<?php echo base_url(); ?>js/back-end/plugins/datatable/ColVis.min.js"></script>
	<script src="<?php echo base_url(); ?>js/back-end/plugins/datatable/jquery.dataTables.columnFilter.js"></script>
	<script src="<?php echo base_url(); ?>js/back-end/plugins/datatable/jquery.dataTables.grouping.js"></script>
	<!-- Chosen -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/chosen/chosen.jquery.min.js"></script>
	<!-- MultiSelect -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/multiselect/jquery.multi-select.js"></script>
	<!-- CKEditor -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/ckeditor/ckeditor.js"></script>
	<!-- PLUpload -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/plupload/plupload.full.js"></script>
	<script src="<?php echo base_url(); ?>js/back-end/plugins/plupload/jquery.plupload.queue.js"></script>
	<!-- Custom file upload -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/fileupload/bootstrap-fileupload.min.js"></script>
	<script src="<?php echo base_url(); ?>js/back-end/plugins/mockjax/jquery.mockjax.js"></script>
	<!-- select2 -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/select2/select2.min.js"></script>
	<!-- icheck -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/icheck/jquery.icheck.min.js"></script>
	<!-- Validation -->
	<script src="<?php echo base_url(); ?>js/back-end/plugins/validation/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>js/back-end/plugins/validation/additional-methods.min.js"></script>
    
	<!-- framework -->
	<script src="<?php echo base_url(); ?>js/back-end/eakroko.min.js"></script>
	<!-- scripts -->
	<script src="<?php echo base_url(); ?>js/back-end/application.min.js"></script>
	 
	<!--[if lte IE 9]>
		<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
    
    <script>

        //When DOM loaded we attach click event to button
        $(document).ready(function() {
            
            //attach keypress to input
            $('.num_only').keydown(function(event) {
                // Allow special chars + arrows 
                if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 
                    || event.keyCode == 27 || event.keyCode == 13 
                    || (event.keyCode == 65 && event.ctrlKey === true) 
                    || (event.keyCode >= 35 && event.keyCode <= 39)){
                        return;
                }else {
                    // If it's not a number stop the keypress
                    if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                        event.preventDefault(); 
                    }   
                }
            });
            
        });

    </script>
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-49336306-1', 'cuyapa.com');
	  ga('send', 'pageview');
	
	</script>
    
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.png" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

</head>

