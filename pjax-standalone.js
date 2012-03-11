/**
 * PJAX- Standalone
 *
 * A standalone implementation of Pushstate AJAX, for non-jquery webpages.
 * JQuery users should use the original implimention at: https://github.com/defunkt/jquery-pjax
 * 
 * @version 0.1
 * @author Carl
 */
(function(){
	//Make a reference to this, so we can ensure its always accessable.
	var _this = this, firstrun = true;
	//Private methods.
	var internal = {};

	//Borrowed wholesale from https://github.com/defunkt/jquery-pjax
	//Attempt to check that a device supports pushstate before attempting to use it.
	var pushstate_supported = window.history && window.history.pushState && window.history.replaceState && !navigator.userAgent.match(/((iPod|iPhone|iPad).+\bOS\s+[1-4]|WebApps\/.+CFNetwork)/);
	
	/**
	 * AddEvent
	 * Cross browser compatable method to add event listeners
	 *
	 * @scope private
	 * @param obj Object to listen on
	 * @param event Event to listen for.
	 * @param callback Method to run when event is detected.
	 */
	internal.addEvent = function(obj, event, callback){
		if(window.addEventListener){
				//Browsers that don't suck
				obj.addEventListener(event, callback, false);
		}else{
				//IE8/7
				obj.attachEvent('on'+event, callback);
		}
	}

	//Util method, recreate options as new object so each link can have differnt settings.
	internal.clone = function(obj){
		object = {};
		for (var i in obj) {
			object[i] = obj[i];
		}
		return object;
	}


	internal.triggerEvent = function(node, event_name){
		if (document.createEvent) {
			event = document.createEvent("HTMLEvents");
    		event.initEvent(event_name, true, true);
    		node.dispatchEvent(event);
		}else{
			event = document.createEventObject();
    		event.eventType = 'on'+ event_name;
    		node.fireEvent(event.eventType, event);
		}
	}


	//Listen for pop state event
	internal.addEvent(window, 'popstate', function(st){
		if(st.state != null){
			var options = internal.parseOptions({	
				'url': st.state.url, 
				'container': st.state.container, 
				'history': false
			});
			if(options == false) return;
			//If there is a state object, handle it as a page load.
			internal.handle(options);
		}
	});

	/**
	 * attach
	 * Attach pjax listeners to a link.
	 * @scope private
	 * @param link_node. link that will be clicked.
	 * @param content_node. 
	 */
	internal.attach = function(node, options){

		//if no pushstate support, dont attach and let stuff work as normal.
		if(!pushstate_supported) return;

		//Ignore external links.
		if ( node.protocol !== document.location.protocol ||
			 node.host !== document.location.host ){
			return;
		}

		options.url = node.href;

		if(node.getAttribute('data-pjax')){
			options.container = node.getAttribute('data-pjax');
		}

		if(node.getAttribute('data-title')){
			options.title = node.getAttribute('data-title');
		}

		options = internal.parseOptions(options);
		if(options == false) return;

		//Attach event.
		internal.addEvent(node, 'click', function(event){
			//Allow middle click (pages in new windows)
			if ( event.which > 1 || event.metaKey ) return;
			//Dont fire normal event
			if(event.preventDefault){event.preventDefault();}else{event.returnValue = false;}
			//Take no action if we are already on said page?
			if(document.location.href == options.url) return false;

			//handle the load.
			internal.handle(options);
			
		});
	}

	/**
	 * handle
	 * Handle requests to load content via pjax.
	 * @scope private
	 * @param url. Page to load.
	 * @param node. Dom node to add returned content in to.
	 * @param addtohistory. Does this load require a history event.
	 */
	internal.handle = function(options){
		
		internal.triggerEvent(options.container, 'beforeSend');

		//Do the request
		internal.request(options.url, function(html){

			//Fire Events
			internal.triggerEvent(options.container,'complete');
			if(html == false){
				internal.triggerEvent(options.container,'error');
				return;
			}else{
				internal.triggerEvent(options.container,'success');
			}

			//Update the dom with the new content
			options.container.innerHTML = html;

			//Get the title if there is one.
			if(options.container.getElementsByTagName('title').length != 0){
				options.title = options.container.getElementsByTagName('title')[0].innerHTML;
			}
			
			//Do we need to add this to the history?
			if(options.history){
				//If this is the first time pjax has run, create a state object for the current page.
				if(firstrun){
					window.history.replaceState({'url': document.location.href, 'container':  options.container.id}, document.title);
					firstrun = false;
				}
				//Update browser history
				window.history.pushState({'url': options.url, 'container': options.container.id }, options.title , options.url);
			}

			//Set new title
			document.title = options.title;
		})
		
	}

	/**
	 * request
	 * Performs ajax request to page and returns the result..
	 * @scope private
	 * @param location. Page to request.
	 * @param callback. Method to call when page is loaded.
	 */
	internal.request = function(location, callback){
		//Create xmlHttpRequest object.
		try {xmlhttp = window.XMLHttpRequest?new XMLHttpRequest(): new ActiveXObject("Microsoft.XMLHTTP");}  catch (e) { }
			//Add state listener.
			xmlhttp.onreadystatechange = function(){
				if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
					callback(xmlhttp.responseText);
				}else if((xmlhttp.readyState == 4) && (xmlhttp.status == 404 || xmlhttp.status == 500)){
					//error
					callback(false);
				}
			}
			//Secret pjax ?get param so browser doesnt return pjax content from cache when we dont want it
			xmlhttp.open("GET", location + '?_pjax', true);
			//Add headers so things can tell the request is ajax.
			xmlhttp.setRequestHeader('X-PJAX', 'true');
			xmlhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

			xmlhttp.send(null);
	}


	internal.parseOptions = function(options){
		//Defaults.
		opt = {};
		opt.history = true;
		opt.title = document.title;
		//Ensure a url and container have been provided.
		if(typeof options.url == 'undefined' || typeof options.container == 'undefined'){
			console.log("URL and Container must be provided.");
			return false;
		}

		//Get history?
		if(typeof options.history == 'undefined'){
			options.history = opt.history;
		}else{
			//Ensure its bool.
			options.history = (!(options.history == false));
		}

		if(typeof options.title == 'undefined'){
			options.title = opt.title;
		}

		//Get Container
		if(typeof options.container == 'string' ) {
			container = document.getElementById(options.container);
			if(container == null){
				console.log("Could not find container with id:"+options.container);
				return false;
			}
			options.container = container;
		}

		//If everything went ok thus far, connect up listeners
		if(typeof options.beforeSend == 'function'){
			internal.addEvent(options.container, 'beforeSend', options.beforeSend);
		}
		if(typeof options.complete == 'function'){
			internal.addEvent(options.container, 'complete', options.complete);
		}
		if(typeof options.error == 'function'){
			internal.addEvent(options.container, 'error', options.error);
		}
		if(typeof options.success == 'function'){
			internal.addEvent(options.container, 'success', options.success);
		}

		return options;
	}

	/**
	 * connect
	 * Attach links to pjax handlers.
	 * @scope public
	 *
	 * Can be called in 3 ways.
	 * Calling as connect(); 
	 * 		Will look for links with the data-pjax attribute.
	 *
	 * Calling as connect(container_id)
	 *		Will try to attach to all links, using the container_id as the target.
	 *
	 * Calling as connect(container_id, class_name)
	 * 		Will try to attach any links with the given classname, using container_id as the target.
	 *
	 */
	this.connect = function(/* options */){
		//connect();
		var options = {};
		//connect(container, class_to_apply_to)
		if(arguments.length == 2){
			options.container = arguments[0];
			options.class = arguments[1];
		}
		
		if(arguments.length == 1){
			if(typeof arguments[0] == 'string' ) {
				//connect(container_id)
				options.container = arguments[0];
			}else{
				//Else connect({url:'', container: ''});
				options = arguments[0];
			}
		}

		//Dont run to the window is ready.
		internal.addEvent(window, 'load', function(){	

			if(typeof options.class != 'undefined'){
				//Get all nodes with the provided classname.
				nodes = document.getElementsByClassName(options.class);
			}else{
				//If no class was provided, just get all the links
				nodes = document.getElementsByTagName('a');
			}
			//For all returned nodes
			for(var i=0; i<nodes.length; i++){
				node = nodes[i];
				internal.attach(node, internal.clone(options));
			}
		});
	}
	



	/**
	 * invoke
	 * Directly invoke a pjax load.
	 *
	 * @scope public
	 *
	 * @param options.url
	 * @param options.container
	 * @param options.title
	 */
	this.invoke = function(options){
		//url, container
		if(arguments.length == 2){
			options.url = arguments[0];
			options.container = arguments[1];
		}
		//Proccess options
		options = internal.parseOptions(options);
		//If everything went ok, activate pjax.
		if(options !== false) internal.handle(options);
		
	}


	//Make object accessable
	window.pjax = this;
}).call({});