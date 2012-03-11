# PJAX-Standalone#

A standalone implementation of push state AJAX, designed for use on non-jquery web pages.
The design is loosely based on the original jquery implementation found at: https://github.com/defunkt/jquery-pjax

This code is licensed under the MIT Licence.

This code has not yet been properly cross browser tested.

### Usage Instructions

To add pjax to your page, you will need to include the pjax-standalone.js script in to the head.

Once done, pjax can be setup in 3 ways. 

#### Option 1
Give all links a data-pjax attribute specifing where to place loaded content:

    <a href='page1.php' data-pjax='content'>Page 1</a>

Then call:

	pjax.connect();

#### Option 2
Add links normally

	<a href='page2.php'>Page 2</a>
	
Then specify what container they should use to place loaded content in.

	pjax.connect('content');

or

	pjax.connect({container: 'content'});

#### Option 3
Setup all links with a specific class to use a particular container to place there content.

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

### Use PJAX-Standalone programmatically

You can invoke a pjax page load programmitcally by calling the pjax.invoke() method.
At minimum the pjax invoke method must be given a url and container attribute. It can also
be provided with a title and any callback you wish to use.

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
	
	
	


      

	
