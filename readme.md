# PJAX-Standalone#

A standalone implementation of push state AJAX, designed for use on non-JQuery web pages.
The design is loosely based on the original jQuery implementation found at: https://github.com/defunkt/jquery-pjax

This code is licensed under the MIT License.

This code has been tested in Chrome, Firefox, Opera and IE7, 8, 9 and 10. 
PJAX is supported in Chrome, Firefox, IE10+ and Opera, while in older IE versions the fall backs operate as expected.

A live version of the demo can be viewed here: http://userbag.co.uk/demo/pjax/

### Usage Instructions

To use PJAX on your page you will need to include the pjax-standalone.js script in to the head of the page. Alternately, if the assets for your site are built (using a tool like grunt) PJAX standalone can also be installed using bower `bower install pjax-standalone`.

Once done, PJAX can be setup in 3 ways. 

#### Option 1
Give all links a data-pjax attribute specifying where to place the content that gets loaded:

    <a href='page1.php' data-pjax='content'>Page 1</a>

Then call:

	pjax.connect();

#### Option 2
Add links normally

	<a href='page2.php'>Page 2</a>
	
Then specify which container they should use, via either

	pjax.connect('content');

or

	pjax.connect({container: 'content'});

#### Option 3
Set all links with a specific class to use a particular container using:

```
	<a href='page2.php' class='pjaxer'>Page 2</a>
```

```
	pjax.connect('content', 'pjaxer');
```	
### Options

The PJAX connect method supports the following options:

* useClass - string - Apply PJAX only to links with the provided class.
* excludeClass - string - If set, PJAX will ignore any link containing the class
* parseLinksOnload - true|false - Make links in loaded pages use PJAX. Enabled by default.
* smartLoad - true|false - Ensure returned HTML is correct. Enabled by default.
* autoAnalytics - true|false - Enabled by default, will attempt to automatically track page views to any detected Google analytics trackers.
* returnToTop - true|false - Enabled by default, scrolls browser window to top of page, when new content is loaded.
* parseJS - true|false - Disabled by default, attempt to execute JavaScript found within pages load via PJAX. (plain JS will be run each time the page loads, external files will only be loaded the first time.)
* ignoreFileTypes - array of file types to be ignored by PJAX. By default this includes PDF, ZIP and a number of other common non-pjax loadable types.

### Callbacks

PJAX-Standalone implements the following callbacks/events:

* beforeSend - Called before AJAX request is made
* complete - When AJAX request has completed
* success - When AJAX request has completed successfully
* error - When AJAX request did not complete successfully (error 404/500 etc)
* ready - Fired when PJAX completes initial link parsing

The callbacks can be specified either as part of the original pjax.connect method:

	pjax.connect({
		'container': 'content',
		'beforeSend': function(e){ console.log("before send"); },
		'complete': function(e){ console.log("done!"); },
	});

Or by adding your own listener to the specified container

	document.getElementById("my_container").addEventListener('complete', function(event){ console.log(event); }, false);

The PJAX options at the time of an event being triggered can be accessed via `event.data`

### Using PJAX-Standalone programmatically

You can invoke a PJAX page load programmatically by calling the `pjax.invoke()` method.
At minimum the PJAX invoke method must be given a `URL` and `container` attribute. It can also
be provided with a `title`, along with any other standard config item or callback you may wish.

	pjax.invoke({url:'page1.php', 'container': 'content'});

or
	
	pjax.invoke('page1.php', 'content');

### Server side.

Update your code to return only the main content area when the X-PJAX header is set, while returning the full website layout when it is not.
	
	<?php
	if(isset($_SERVER['HTTP_X_PJAX']) && $_SERVER['HTTP_X_PJAX'] == 'true'){
		// Output content on its own.
	}else{
		// Output content with wrapper/layout
	}

If you are unable to change the server side code or simply do not want to, So long as smartLoad is enabled (which it is by default), PJAX-Standalone will extract the container_divs content from the returned HTML and apply it to the current page meaning PJAX loading will still work as expect (although some of PJAX's performance gains may be lost).


	
	
	


      

	
