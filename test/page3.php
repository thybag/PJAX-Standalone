<?php
$title = 'Page 3..';
$contents = '
	<h1>Page 3</h1>
	<p>Nunc dui massa, tincidunt non interdum id, iaculis vitae tellus. Donec et lectus at neque consectetur facilisis nec eget ante. Proin egestas volutpat semper. Mauris aliquam metus eget nibh tincidunt luctus sit amet id mauris. Aliquam vitae ipsum diam, at rutrum arcu. Suspendisse potenti. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
';



$headers = getallheaders();
if(($headers['X-PJAX'] == 'true')){
	echo $contents;
}else{
	include 'wrapper.php';
}

