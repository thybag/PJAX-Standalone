<?php
$title = 'Demo 2 - Jump links';
$contents = '
	<h1>Demo 2 - Jump links</h1>

	<p>PJAX will automatically ignore jump links found within the same document, so clicking <a href="#hi1">here</a> to
	 jump to "heading of interest" will not trigger a page reload. But, clicking <a href="index.php#what">this</a> (a link to the "What is PJAX" 
	 	section on the home page) will.</p>

	<p>If PJAX is unable to load a link <a href="broken page">such as this broken one</a>, the link will be ignored (although the error event will be fired). The demo page is set up to log messages to the 
	browser console whenever a success, ready or error event is fired.</p>

	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor turpis magna, eu placerat odio consectetur vel. In sed arcu vel neque interdum feugiat. Suspendisse non nisl libero. Duis facilisis, libero vitae scelerisque mollis, augue mi sodales mauris, volutpat congue tortor elit ut magna. Sed quis tincidunt diam. Fusce eget lacinia nisi, sit amet tincidunt elit. Nam rutrum tortor eget enim rhoncus, convallis semper sem tincidunt.</p>

<p>Vestibulum non risus ut metus porta consectetur eget sit amet tellus. Morbi ut turpis auctor, euismod sapien nec, sollicitudin augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae commodo lorem. In quis dui lobortis, adipiscing justo vel, feugiat augue. Integer tincidunt ultrices nulla, egestas venenatis eros hendrerit sit amet. Proin ornare orci sit amet magna laoreet vehicula. Nunc consectetur mi at cursus porta. Praesent dictum, magna vel mollis sodales, justo sem sagittis tortor, nec tempor diam ligula sit amet arcu. Vivamus dignissim elementum diam ut rutrum. Donec nec tortor at leo suscipit mattis. Phasellus neque nisi, rutrum eu metus id, aliquet dapibus ante. Aliquam ac metus a ligula scelerisque viverra ac sit amet eros.</p>

<a name="hi1"></a>
<h3>Heading of interest</h3>
<p>Sed ut magna a lorem convallis imperdiet. In hac habitasse platea dictumst. Mauris a fermentum libero, a interdum magna. Sed vestibulum lectus odio, at gravida dui accumsan vehicula. Cras eget magna eget orci aliquet fringilla. Vestibulum lacinia commodo euismod. Ut eget scelerisque mi. Aenean faucibus et neque et accumsan. Aliquam non neque sed ante hendrerit laoreet non ut nibh.</p>

<p>Integer massa erat, lacinia quis felis eget, sodales hendrerit ante. Donec adipiscing arcu elit, id suscipit lacus malesuada id. Quisque nec metus eget massa sollicitudin pulvinar nec in nibh. Nunc nec ultricies lacus. Quisque est nibh, pharetra eget lacus at, aliquam adipiscing eros. Nulla sagittis nunc at euismod congue. Cras a ipsum in eros pharetra iaculis. Cras quis lorem vel magna eleifend sagittis. Maecenas leo lectus, feugiat in lorem ac, imperdiet mollis tellus. Mauris sollicitudin vehicula dui. Nunc sodales lacus vel ipsum consequat, non iaculis augue euismod. Integer facilisis sagittis urna vitae congue. Morbi luctus vehicula scelerisque. Aliquam nisi dolor, consequat ac ante eu, aliquam viverra sem.</p>
<h3>Heading of interest 2</h3>
<p>Cras purus augue, vehicula eu cursus id, vehicula nec ante. Suspendisse ac lectus vitae est pellentesque faucibus sit amet vel erat. Maecenas sem leo, tempus ut tincidunt at, posuere nec massa. Nullam commodo nulla et lobortis rhoncus. Integer aliquam augue et justo laoreet tristique eu eu mauris. Praesent ut urna sed augue auctor ornare at vitae nisl. Aliquam ultrices ante at sapien porta, non semper lacus pellentesque. Aenean placerat eleifend orci eget viverra. Etiam faucibus elit sed sem vestibulum euismod. Nunc blandit sem lorem, ut accumsan sapien consectetur a. Pellentesque sagittis metus eu placerat posuere. Pellentesque eget ultrices eros, ac tincidunt leo. Aenean sagittis mollis interdum.</p>

<p>Nunc dui massa, tincidunt non interdum id, iaculis vitae tellus. Donec et lectus at neque consectetur facilisis nec eget ante. Proin egestas volutpat semper. Mauris aliquam metus eget nibh tincidunt luctus sit amet id mauris. Aliquam vitae ipsum diam, at rutrum arcu. Suspendisse potenti. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

';

if(isset($_SERVER['HTTP_X_PJAX']) && $_SERVER['HTTP_X_PJAX'] == 'true'){
	echo $contents;
	echo "<title>{$title}</title>";
}else{
	include 'wrapper.php';
}

