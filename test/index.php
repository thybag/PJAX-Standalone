<?php

$title = 'PJAX-Standalone';
$contents = '
	<h1>PJAX-Standalone</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec suscipit massa velit. Nunc volutpat rutrum urna eget suscipit. Aliquam lacinia molestie venenatis. Integer semper sem sit amet quam hendrerit aliquet. Sed magna nunc, laoreet sit amet dignissim nec, hendrerit nec leo. Phasellus sit amet pharetra nibh. Sed eget est vel eros adipiscing facilisis. Integer magna lacus, varius id dictum a, adipiscing eu quam. Duis fermentum luctus blandit.</p>
	<p>Sed sit amet consectetur nisl. Praesent ante tellus, semper vel bibendum sit amet, aliquam ut felis. Mauris vehicula tristique felis ac scelerisque. Integer quis nunc turpis. Cras lacinia egestas erat in cursus. Sed vel ligula feugiat mauris bibendum sodales sollicitudin a libero. Vivamus interdum lorem sed justo congue feugiat.</p>
	<p>In lacinia ipsum a augue porttitor iaculis. Etiam commodo fringilla tortor eget vehicula. Morbi gravida sapien ut nunc congue egestas. Praesent at nulla eu neque ornare lobortis at sed enim. Nulla eu pulvinar enim. Aliquam mi massa, dictum at porta et, dapibus ac risus. Pellentesque urna lectus, dignissim a suscipit congue, dictum et lorem. Cras enim massa, malesuada faucibus suscipit vel, accumsan in lectus. Fusce id odio vitae risus interdum volutpat. In eu mi lectus, et rhoncus nibh.</p>
	<p>Maecenas ac lacus eget justo vestibulum fringilla. Cras lacinia mi et justo imperdiet hendrerit. Quisque enim nisi, imperdiet quis porttitor nec, dignissim sed turpis. Ut suscipit adipiscing felis ac bibendum. Vestibulum quis enim nisi. Vestibulum ac purus id tortor tincidunt lobortis sed ut erat. Pellentesque auctor aliquam commodo. Maecenas vel leo magna. Nunc a lectus bibendum quam ultrices fermentum vel non ante. Vivamus viverra sagittis nisi et dictum. Vivamus egestas scelerisque lectus a vehicula. In sodales, leo ac posuere rutrum, mauris nisi eleifend urna, quis vestibulum nisl est sed magna.</p>
	<p>Nunc dui massa, tincidunt non interdum id, iaculis vitae tellus. Donec et lectus at neque consectetur facilisis nec eget ante. Proin egestas volutpat semper. Mauris aliquam metus eget nibh tincidunt luctus sit amet id mauris. Aliquam vitae ipsum diam, at rutrum arcu. Suspendisse potenti. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
';



$headers = getallheaders();
if(($headers['X-PJAX'] == 'true')){
	echo $contents;
	echo "<title>{$title}</title>";
}else{
	include 'wrapper.php';
}

