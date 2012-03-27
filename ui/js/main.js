$(document).ready(function() {

	// copy text	
	$('.package h3').each(function(){		
		$jcopyimg = $('<img class="jcopy" src="ui/img/jcopy.png" />');	
		$(this).append($jcopyimg);	
		$(this).find('.jcopy').zclip({
			path:'ui/inc/ZeroClipboard.swf',
			copy:$(this).text()
		});
	});
	
	// popover	
	$("a[rel=popover]")
	  .popover()
	  .click(function(e) {
	    e.preventDefault()
	  });
	
});