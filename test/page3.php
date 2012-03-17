<?php
$title = 'Page 3 - With a drunk cat.';
$contents = '
	<img src="img/cat.jpg" alt="Picture of a drunk cat" style="width:50%;float:right">
	<h1>Page 3 - Drunk Cat.</h1>
	<p>
		Welcome to demo page 3. Here we see a picture of a drunk cat 
		(which is totally 100% not at all staged... *shifty eyes*).
	</p>
	<p>
		You\'ll see that along with the url and webpage content, the title has also been updated.
		Using PJAX you can even give pages custom titles, for example

		<a href="page2.php" data-title="Custom title!">this link</a>
		 will open page 2  with the title "Custom title!".
	</p>
';

if($_SERVER['HTTP_X_PJAX'] == 'true'){
	echo $contents;
	echo "<title>{$title}</title>";
}else{
	include 'wrapper.php';
}

