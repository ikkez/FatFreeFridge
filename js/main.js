$(document).ready(function() {

	// copy text
	/*$('.package h3').each(function(){
		$jcopyimg = $('<img class="jcopy" src="ui/img/jcopy.png" />');
		$(this).append($jcopyimg);
		$(this).find('.jcopy').zclip({
			path:'ui/inc/ZeroClipboard.swf',
			copy:$(this).text()
		});
	});*/

	/* PopOver
	***********/
	$("a[rel=popover]")
	  .popover()
	  .click(function(e) {
	    e.preventDefault()
	  });


	/* Smoothscroll
	****************/
	$('a[href*=#]').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		   var $target = $(this.hash);
		   $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
		   if ($target.length) {
		       var targetOffset = $target.offset().top;
		       $('html,body').animate({scrollTop: targetOffset-60}, 500);
		       return false;
		   }
		}
	});


	/* Hidden Sections
	*******************/
	$(".collapse").collapse().on('show',function(){
		$(this).prev('button.more').text('hide details');
	}).on('hide',function(){
		$(this).prev('button.more').text('view details');
	});


	/* SearchBox
	*******************/
	if($('#search-query').length != 0) {
		$('#search-query').quicksearch('.package h3', {
			'show': function () {
				$(this).parent().show();
			},
			'hide': function () {
				$(this).parent().hide();
			},
		});
	}

	// enable code highlighting
	prettyPrint();

});
