<?php

$title = 'PJAX-Standalone';
$contents = '
	<h1>PJAX-Standalone</h1>
	
	<p>
		Pjax-Standalone is a standalone implementation of defunkt\'s original
		<a href=\'https://github.com/defunkt/jquery-pjax\'>jQuery-PJAX</a> plugin. With no external dependencies, PJAX-Standalone can 
		be dropped into and used on any website, regardless of the JavaScript frameworks in use.
	</p>
	<h3>About</h3>
	<p>
		PJAX Standalone is easy to set up and get working with both new and existing websites. Adding the PJAX-Standalone 
		JavaScript to the head of your website and calling <code>pjax.connect("id_of_container");</code> is all thats needed
		to get it working.
	</p>
	<p>
		By default PJAX-Standalone uses it\'s "smartload" feature in order to work with existing with pages with no server side support for PJAX. If 
		your server side code is configured to work with PJAX (thus only returning the content needed for rendering) this feature can be 
		disabled for even more performance gains.</p>
	<p>
		<strong>Is PJAX-Standlone worth having on my site?</strong><br/>
		PJAX provides the most benefit if your website design comprises primarily of one main content area, surrounded by a 
		wrapper (header, footer, aside) that rarely change. Since PJAX only ever has to reload the main container area\'s content, assets such as CSS, JavaScript, images and others will only be loaded once.
	</p>

	<p>
		<strong>How customizable is PJAX-Standalone</strong><br/>
		PJAX-Standalone fires a number of events, which can be used to extend its native functionality. Additionally
		a number of additional options can be specified in the connect method, in order to further configure how PJAX-Standalone functions. 
		Documentation on the events and options available in PJAX can be seen in the <a href="https://github.com/thybag/PJAX-Standalone/t">github readme</a>.
	</p>
	<a name="what"></a>
	<h3>What is PJAX</h3>
	<p>
		PJAX (Push-state AJAX) is a performance optimization, allowing users to browse websites without the overhead of 
		reloading assets such as CSS & images each time a web page is loaded.
	</p>
	<p>
		PJAX works by using AJAX to "load" pages on behalf of the user, then dynamically swapping the contents of
		the "container" for the newly loaded content from the link the user clicked. Unlike older AJAX solution\'s PJAX
		fully preserves permalinks and back button functionality. Using progressive enhancement, PJAX will 
		seamlessly fall back to loading pages in the normal way in older browsers, while newer browsers can make use
		of the improved performance.
	</p>	
';

if(isset($_SERVER['HTTP_X_PJAX']) && $_SERVER['HTTP_X_PJAX'] == 'true'){
	echo $contents;
	echo "<title>{$title}</title>";
}else{
	include 'wrapper.php';
}

