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

	//Borrowed wholesale from https://github.com/defunkt/jquery-pjax
	//Attempt to check that a device supports pushstate before attempting to use it.
	var pushstate_supported = window.history && window.history.pushState && window.history.replaceState && !navigator.userAgent.match(/((iPod|iPhone|iPad).+\bOS\s+[1-4]|WebApps\/.+CFNetwork)/);
	
	/**
	 * AddEvent
	 * Cross browser compatable method to add event listeners
	 * @param obj Object to listen on
	 * @param event Event to listen for.
	 * @param callback Method to run when event is detected.
	 */
	this.addEvent = function(obj, event, callback){
		if(window.addEventListener){
				//Browsers that don't suck
				obj.addEventListener(event, callback, false);
		}else{
				//IE8/7
				obj.attachEvent('on'+event, callback);
		}
	}

	//Listen for pop state event
	this.addEvent(window,'popstate', function(st){
		if(st.state != null){
			//If there is a state object, handle it as a page load.
			_this.handle(st.state.url, document.getElementById(st.state.node_id), false);
		}
	});

	/**
	 * attach
	 * Attach pjax listeners to a link.
	 * @param link_node. link that will be clicked.
	 * @param content_node. 
	 */
	this.attach = function(link_node, content_node){

		//if no pushstate support, dont attach and let stuff work as normal.
		if(!pushstate_supported) return;

		//Ignore external links.
		if ( link_node.protocol !== document.location.protocol ||
			 link_node.host !== document.location.host ){
			return;
		}
		//If content_node is string, assum its an id.
		if(typeof content_node == 'string') content_node = document.getElementById(content_node);

		//Attach event.
		this.addEvent(link_node, 'click', function(event){

			//Allow middle click
			if ( event.which > 1 || event.metaKey ) return;
			//Dont fire normal event
			if(event.preventDefault){event.preventDefault();}else{event.returnValue = false;}
			//Take no action if we are already on said page?
			if(document.location.href == link_node.href) return;
			//handle the load.
			_this.handle(link_node.href, content_node, true);
		})
	}

	/**
	 * handle
	 * Handle requests to load content via pjax.
	 * @param url. Page to load.
	 * @param node. Dom node to add returned content in to.
	 * @param addtohistory. Does this load require a history event.
	 */
	this.handle = function(url, node, addtohistory){
		
		//Do the request
		this.request(url, function(html){
			
			//Update the dom with the new content
			node.innerHTML = html;

			//Get the title if there is one.
			title = document.title;
			if(node.getElementsByTagName('title').length != 0){
				title = node.getElementsByTagName('title')[0].innerHTML;
			}
			//Set the title
			document.title = title ;

			//Do we need to add this to the history?
			if(addtohistory){
				//If this is the first time pjax has run, create a state object for the current page.
				if(firstrun){
					window.history.replaceState({'url': document.location.href, 'node_id':  node.id}, document.title);
					firstrun = false;
				}
				//Update browser history
				window.history.pushState({'url': url, 'node_id': node.id }, title , url);
			}
			
		})
		
	}

	/**
	 * request
	 * Performs ajax request to page and returns the result..
	 * @param location. Page to request.
	 * @param callback. Method to call when page is loaded.
	 */
	this.request = function(location, callback){
		//Create xmlHttpRequest object.
		try {xmlhttp = window.XMLHttpRequest?new XMLHttpRequest(): new ActiveXObject("Microsoft.XMLHTTP");}  catch (e) { }
			//Add state listener.
			xmlhttp.onreadystatechange = function(){
				if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
					callback(xmlhttp.responseText);
				}
			}
			//Secret pjax ?get param so browser doesnt return pjax content from cache when we dont want it
			xmlhttp.open("GET", location + '?_pjax', true);
			//Add headers so things can tell the request is ajax.
			xmlhttp.setRequestHeader('X-PJAX', 'true');
			xmlhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

			xmlhttp.send(null);
	}

	/**
	 * connect
	 * Attach links to pjax handlers.
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
	this.connect = function(target_id, class_name){
		//Dont run to the window is ready.
		this.addEvent(window,'load', function(){
			
			if(typeof class_name != 'undefined'){
				//Get all nodes with the provided classname.
				nodes = document.getElementsByClassName(class_name);
			}else{
				//If no class was provided, just get all the links and filter
				//based on who has a data-pjax attribute
				nodes = document.getElementsByTagName('a');
			}
			//For all returned nodes
			for(i=0;i<nodes.length;i++){
				node = nodes[i];
				//If it has a data-pjax, use that as the target.
				if(target = node.getAttribute('data-pjax')){
					_this.attach(node, target);
				}else{
					//Else attempt to use target_id if it was provided.
					if(typeof target_id != 'undefined'){
						_this.attach(node, target_id);
					}
				}
			}
		});
		
	}
	
	//Make object accessable
	window.pjax = this;
}).call({});