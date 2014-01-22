# PJAX-Standalone#

A standalone implementation of push state AJAX, designed for use on non-JQuery web pages.
The design is loosely based on the original jQuery implementation found at: https://github.com/defunkt/jquery-pjax

This code is licensed under the MIT License.

This code has been tested in Chrome, Firefox, Opera and IE7,8 and 9. 
PJAX is supported in Chrome, Firefox and Opera, while in IE the fall backs operate as expected.

A live version of the demo can be viewed here: http://userbag.co.uk/demo/pjax/

### Usage Instructions

To add pjax to your page, you will need to include the pjax-standalone.js script in to the head of your document.

Once done, PJAX can be setup in 3 ways. 

#### Option 1
Give all links a data-pjax attribute specifying where to place the content that gets loaded.:

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

### Callbacks

PJAX-Standalone impliments the following callbacks 

* beforeSend - Called before ajax request is made
* complete - When ajax request has completed
* success - When ajax request has completed successfully
* error - When ajax request did not complet successfully (error 404/500 etc)

The callbacks are specified as part of the original pjax.connect method:

	pjax.connect({
		'container': 'content',
		'beforeSend': function(){console.log("before send");},
		'complete': function(){console.log("done!");},
	});

In addition to the callbacks the following options can also be provided to PJAX connect.

* useClass - string - Apply PJAX only to links with the provided class.
* parseLinksOnload - true|false - Make links in loaded pages use PJAX. Enabled by default.
* smartLoad - true|false - Ensure returned HTML is correct. Enabled by default.

### Using PJAX-Standalone programmatically

You can invoke a pjax page load programmatically by calling the pjax.invoke() method.
At minimum the pjax invoke method must be given a url and container attribute. It can also
be provided with a title, parseLinksOnload setting and any callbacks you wish to use.

	pjax.invoke({url:'page1.php', 'container': 'content'});

or
	
	pjax.invoke('page1.php', 'content');

### Server side.

Update your code to return only the main content area when the X-PJAX header is set, while returning the full website layout when it is not.
	
	<?php
	$headers = getallheaders();
	if(($headers['X-PJAX'] == 'true')){
		//Output content on its own.
	}else{
		//Output content with wrapper/layout
	}

If you are unable to change the backend code, or simply do not want to. So long as smartLoad is enabled (which it is by default), PJAX-Standalone will extract the container_divs content from the returned HTML and apply it to the current page meaning PJAX loading will still work as expect (although some of PJAX's performance gains may be lost).


	
	
	


      

	
