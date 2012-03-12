<!DOCTYPE html>
<html dir="ltr" lang="en-GB">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $title; ?></title>

	<script type="text/javascript" src='../pjax-standalone.js'></script> 
	<script type='text/javascript'>
		//PJAX links!
		//pjax.connect('content', 'pjaxer');
		//pjax.connect('content');
		//pjax.connect();
		
		pjax.connect({
			'container': 'content',
			'beforeSend': function(){console.log("before send");},
			'complete': function(){console.log("done!");}
		});
		
	</script>

	<!-- Local styles for Demo -->
	<style type='text/css'>
		body{
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; 
			font-size:0.9em; 
			margin:0;padding:0;
		}
		.main .header {
			background-color:#222;
			color:#fff;
			padding:8px; 
		}
		.main .header .heading{
			width:880px; 
			margin:0 auto;
		}
		.main .header h1 {
			margin:5px 0;
		}
		.main .header a {
			color:#fff;
		}
		.main .header .get{
			width:120px;
			height:20px;
			margin-top:15px;
			color:#fff;
			float:right;
		}
		.body {
			padding:0 0px;
			background-color:#fff;
		}
		a {color:#000;}
		.body .seperator{
			background-color:#222;
			padding:4px;
			clear:both;
			color:#fff;
			margin:5px 0;
			font-weight:bold;
		}
		.body .nav {
			padding:4px;
			background-color:#999;
		}
		.body .links {		
			margin:0 auto;
			width:900px;
		}
		.body .links a {
			padding:8px;
		}
		#content {
			margin:0 20px;
		}
		
		
	</style>
</head>
<body>
	<div class='main'>
		<div class='header'>
			
			<div class='heading'>
				<div class='get'><a href='https://github.com/thybag/PJAX-Standalone'>Get the Source</a></div>
				<h1>PJAX-Standalone Test Page</h1>
				Loaded at: <?php echo date('l jS \of F Y h:i:s A'); ?>
			</div>
		</div>
		<div class='body'>
			<div class='nav'>
				<div class='links'>
					<a href='.' data-pjax='content'>Home</a>
					<a href='page1.php' data-pjax='content'>Page 1</a>
					<a href='page2.php' data-pjax='content'>Page 2</a>
					<a href='page3.php' data-title='Page 3!'>Page 3</a>
				</div>
			</div>
			<div id='content'>
				<?php echo $contents; ?>

			</div>
		</div>
	</div>
</body>
</html>