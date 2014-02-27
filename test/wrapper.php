<!DOCTYPE html>
<html dir="ltr" lang="en-GB">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $title; ?></title>

	<script type="text/javascript" src='../pjax-standalone.js'></script> 
	<script type='text/javascript'>
		// Ensure console is defined
		if(typeof console === 'undefined') console = {"log":function(m){}};

		// PJAX links!
		pjax.connect({
			'container': 'content',
			'success': function(event){
				var url = (typeof event.data !== 'undefined') ? event.data.url : '';
				console.log("Successfully loaded "+ url);
			},
			'error': function(event){
				var url = (typeof event.data !== 'undefined') ? event.data.url : '';
				console.log("Could not load "+ url);
			},
			'ready': function(){
				console.log("PJAX loaded!");
			}
		});
		// pjax.connect('content', 'pjaxer');
		// pjax.connect('content');
		// pjax.connect();

	</script>
	<!-- Local styles for Demo -->
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootswatch/3.0.3/cosmo/bootstrap.min.css" media="screen" />
	
</head>
<body>
	<div class="navbar navbar-default navbar-static-top">
		<div class="navbar-header">
			<a href="." class="navbar-brand">PJAX Standalone</a>
		</div>
	 	<ul class="nav navbar-nav" style='margin-left:20px;'>
			<li><a href='.' data-pjax='content'>Home</a></li>
			<li><a href='page1.php' data-pjax='content'>Demo 1</a></li>
			<li><a href='page2.php' data-pjax='content'>Demo 2</a></li>
			<li><a href='page3.php?test=test' class='no'>Demo 3</a></li>
		</ul>
	</div>
	<div class='container'>
		<div id='content' class='col-sm-8'>
			<?php echo $contents; ?>			
		</div>
		<div class='col-sm-4'>
			<p class='well'><strong>Loaded at:</strong><br/> <?php echo date('l jS \of F Y h:i:s A'); ?></p>
			<p>
				<a href='https://github.com/thybag/PJAX-Standalone' class='btn btn-block btn-primary'>Get the Source</a>
			</p>
			<p>PJAX-Standalone is licensed under the MIT License.</p>

			<p>Install with <a href='http://bower.io/'>bower</a>:</p>
			<p><code>bower install pjax-standalone</code></p>

			<hr />
			<p>Full documentation for using PJAX-Standalone can be found in the <a href='https://github.com/thybag/PJAX-Standalone'>github readme file</a>.</p>
		</div>
	</div>
	<script>
		//document.getElementById("content").addEventListener('complete', function(e){ console.log(e); }, false);
	</script>
</body>
</html>