<?php
$title = 'Page 2: Test data';
$contents = '
	<h1>Page 2 - Test data</h1>
	<p>Nunc dui massa, <a href="#jump">jump to a section</a> tincidunt non interdum id, <a href="http://local.proj/pjax-standalone/test/page3.php#jump_link_not_same_page">on page 3</a>iaculis vitae tellus. Donec et lectus at neque consectetur facilisis nec eget ante. Proin egestas volutpat semper. Mauris aliquam metus eget nibh tincidunt luctus sit amet id mauris. Aliquam vitae ipsum diam, at rutrum arcu. Suspendisse potenti. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

<p>Nunc dui massa, tincidunt non interdum id, iaculis vitae tellus. Donec et lectus at neque consectetur facilisis nec eget ante. Proin egestas volutpat semper. Mauris aliquam metus eget nibh tincidunt luctus sit amet id mauris. Aliquam vitae ipsum diam, at rutrum arcu. Suspendisse potenti. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
<p>Nunc dui massa, tincidunt non interdum id, iaculis vitae tellus. Donec et lectus at neque consectetur facilisis nec eget ante. Proin egestas volutpat semper. Mauris aliquam metus eget nibh tincidunt luctus sit amet id mauris. Aliquam vitae ipsum diam, at rutrum arcu. Suspendisse potenti. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
<a id="jump"></a><h3>A section</h3>
<p>Nunc dui massa, tincidunt non interdum id, iaculis vitae tellus. Donec et lectus at neque consectetur facilisis nec eget ante. Proin egestas volutpat semper. Mauris aliquam metus eget nibh tincidunt luctus sit amet id mauris. Aliquam vitae ipsum diam, at rutrum arcu. Suspendisse potenti. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
<p>Nunc dui massa, tincidunt non interdum id, iaculis vitae tellus. Donec et lectus at neque consectetur facilisis nec eget ante. Proin egestas volutpat semper. Mauris aliquam metus eget nibh tincidunt luctus sit amet id mauris. Aliquam vitae ipsum diam, at rutrum arcu. Suspendisse potenti. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
<p>Nunc dui massa, tincidunt non interdum id, iaculis vitae tellus. Donec et lectus at neque consectetur facilisis nec eget ante. Proin egestas volutpat semper. Mauris aliquam metus eget nibh tincidunt luctus sit amet id mauris. Aliquam vitae ipsum diam, at rutrum arcu. Suspendisse potenti. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

<p>Nunc dui massa, tincidunt non interdum id, iaculis vitae tellus. Donec et lectus at neque consectetur facilisis nec eget ante. Proin egestas volutpat semper. Mauris aliquam metus eget nibh tincidunt luctus sit amet id mauris. Aliquam vitae ipsum diam, at rutrum arcu. Suspendisse potenti. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
 
 <button onclick="pjax.invoke(\'index.php\', \'content\');"> go home (test invoke)</button>
';

if(isset($_SERVER['HTTP_X_PJAX']) && $_SERVER['HTTP_X_PJAX'] == 'true'){
	echo $contents;
	echo "<title>{$title}</title>";
}else{
	include 'wrapper.php';
}

