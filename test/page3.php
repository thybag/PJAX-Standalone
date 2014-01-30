<?php
$title = 'Page 3 - Cat';
$contents = '
	
	<h1>Demo 3 - Cat picture.</h1>
	<p>
		You\'ll see that along with the URL and container content, the title has also been updated.
		Using PJAX you can even give pages custom titles, for example

		<a href="page2.php" data-title="Custom title!">this link</a>
		 will open page 2  with the title "Custom title!".
	</p>
	<hr/>
	<h3>A picture of a cat.</h3>
	<img src="img/cat.jpg" alt="Picture of a drunk cat" />
	<p>There really isn\'t a good reason for this...</p>
';

if(isset($_SERVER['HTTP_X_PJAX']) && $_SERVER['HTTP_X_PJAX'] == 'true'){
	echo $contents;
	echo "<title>{$title}</title>";
}else{
	include 'wrapper.php';
}

