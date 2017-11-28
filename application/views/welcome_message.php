<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dropzone.js file upload using codeigniter</title>

	<style type="text/css">
	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }
	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}
	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}
	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}
	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}
	#body {
		margin: 0 15px 0 15px;
	}
	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	.final-info{
		margin: 15px 0;
	    background-color: #f5f5f5;
	    padding: 20px;
	}
	#submit_dropzone_form{
		margin-top: 5px;
	}
	</style>
	<!-- Loading dropzone.css -->
	<link href="<?php echo base_url(); ?>assets/dropzone/dropzone.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<div id="container">
	<h1>Using Dropzone.js with codeigniter</h1>
	<div id="body">
		<form method="post" action="<?php echo base_url(); ?>index.php/welcome/uploads" enctype="multipart/form-data" class="dropzone" id="myAwesomeDropzone">
		</form>
		<button type="button" id="submit_dropzone_form">UPLOAD</button>
		<div class="final-info">
			<label for="uploaded_files">Response recieved will be displayed here</label>
			<input type="text" id="uploaded_files">
		</div>

	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Loading dropzone.js --> 
<script src="<?php echo base_url(); ?>assets/dropzone/dropzone.js"></script>
<!-- Initiliazing dropzone -->
<script>
Dropzone.options.myAwesomeDropzone = {
	autoProcessQueue: false,
  	uploadMultiple: true,
  	parallelUploads:10,
	successmultiple:function(data,response){
		$("#uploaded_files").val(response);
	},
	init: function() {
		//Submitting the form on button click
		var submitButton = document.querySelector("#submit_dropzone_form");
			myDropzone = this; // closure
			submitButton.addEventListener("click", function() {
			myDropzone.processQueue(); // Tell Dropzone to process all queued files.
		});
	}
};
</script>
</body>
</html>