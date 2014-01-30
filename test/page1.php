<?php

$title = 'Demo 1: Is it working?';
$contents = '
	<h1>Demo 1 - Actual time.</h1>
	<p>The real time is: <strong>'.date('l jS \of F Y h:i:s A').'</strong>.</p>
	<p>If the above time does not match that of the "Loaded at" (section on the right) then this page was successfully requested via PJAX.</p>
	<p>Currently this page is simply returning the full HTML version of itself rather than PJAX ready content, meaning smartLoad is being used to seamlessly extract only the required content.</p>

	<h3>Invoke</h3>
	<p>The below button uses the <code>pjax.invoke()</code> method to load the home page (via PJAX if it is supported).</p>
	<button onclick="pjax.invoke(\'index.php\', \'content\');" class="btn">Try me</button>
';

//Page 1 returns the full HTML, not the PJAX content and is then correct by the smartLoad feature.
include 'wrapper.php';

