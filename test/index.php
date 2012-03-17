<?php

$title = 'PJAX-Standalone';
$contents = '
	<h1>PJAX-Standalone</h1>
	
	<p>Pjax-Standalone is a standalone implimention of defunkt\'s original
	<a href=\'https://github.com/defunkt/jquery-pjax\'>JQuery-PJax</a> plugin which has no dependencies and thus can be dropped in to, and used, on any webpage
	you wish, regardless of the JavaScript framework employed (or even if none is used at all).
	</p>
	<p>
	Like its counterpart, PJAX-Standalone is designed to be incredibly easy to setup and add in
	to existing web pages. In many sites nothing more will be needed than inclusion of the script in to the page
	and a single call to "pjax.connect(\'my_content_div\');"


	</p>

	<h3>What is PJAX</h3>
	<p>
	PJAX (Push-state AJAX) for the most part is a speed optimisation. 
	It allows users to navigate your website without ever having to reload 
	the entire page (or wait for the browser to redraw the main layout)

	while still preserving the page titles, permalinks and full back button functionality. Additionally, if 
	a browser does not support the PJAX feature set, the links will simply work as normal, allowing
	it to degrade gracefully without ever impacting the functionality of a website.
	</p>

	
';

if($_SERVER['HTTP_X_PJAX'] == 'true'){
	echo $contents;
	echo "<title>{$title}</title>";
}else{
	include 'wrapper.php';
}

