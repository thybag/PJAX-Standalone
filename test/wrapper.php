<!DOCTYPE html>
<html dir="ltr" lang="en-GB">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $title; ?></title>

	<script type="text/javascript" src='../pjax-standalone.js'></script> 
	<script type='text/javascript'>
		//PJAX links!
		pjax.connect({
			'container': 'content',
			'beforeSend': function(){console.log("before send");},
			'complete': function(){console.log("done!");}
		});
		//pjax.connect('content', 'pjaxer');
		//pjax.connect('content');
		//pjax.connect();
		
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
			width:900px; margin:0 auto;
		}
		.get_button {
			background:#666;
			padding:10px 15px;
			text-decoration:none;
			border-radius:4px;
			float:right;
			margin-top:8px;
			background: -webkit-gradient(linear,left top,left bottom, from(#666), to(#444));
			background: -moz-linear-gradient(top,#666,#444);
			-webkit-box-shadow: inset 0px 1px 1px 0px #888, 0px 2px 2px 0px rgba(0,0,0,0.5);
			-moz-box-shadow: inset 0px 1px 1px 0px #888, 0px 2px 2px 0px rgba(0,0,0,0.5);
		}
		.get_button:hover {
			background: -webkit-gradient(linear,left top,left bottom, from(#444), to(#555));
			background: -moz-linear-gradient(top,#444,#555);
		}
	</style>
</head>
<body>
	<div class='main'>
		<div class='header'>
			
			<div class='heading'>
				<div class='get'><a target='_blank' href='https://github.com/thybag/PJAX-Standalone' class='get_button' >Get the Source</a></div>
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
					<a href='page3.php?test=test'>Page 3</a>
				</div>
			</div>
			<div id='content'>
				<?php echo $contents; ?>
			</div>
		</div>
	</div>
</body>
</html>