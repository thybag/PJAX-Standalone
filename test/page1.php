<?php

$title = 'Page 1: Hello Tester';
$contents = '
	<h1>Page 1 - Actual time.</h1>
	<p>The real time is: <strong>'.date('l jS \of F Y h:i:s A').'</strong>.</p>
	<p>If the above time does not match that of the "Loaded at" then this page was requested via PJAX.</p>
';

$headers = getallheaders();
if(($headers['X-PJAX'] == 'true')){
	echo $contents;
	echo "<title>{$title}</title>";
}else{
	include 'wrapper.php';
}

