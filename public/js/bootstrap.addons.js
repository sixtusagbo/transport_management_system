"use strict";
//Wrapping all JavaScript code into a IIFE function for prevent global variables creation
(function($){

var $body = $('body');
var $window = $(window);


//function that initiating template plugins on window.load event
function windowLoadInit() {

	//background image cover - set image inside element with this class as a background to cover whole container
	$(".cover-image").each(function(){
		var $element = $(this);
		var $image = $element.find("img").first();
		if (!$image.length) {
			$image = $element.parent().find("img").first();
		}
		if (!$image.length) {
			return;
		}
		var imagePath = $image.attr("src");
		$element.css("background-image", "url(" + imagePath + ")");
		var $imageParent = $image.parent();
		//if image inside link - adding this link
		if ($imageParent.is('a')) {
			$element.prepend($image.parent().clone().html(''));
		}
	});

}//eof windowLoadInit

$window.on('load', function(){
	windowLoadInit();
}); //end of "window load" event

//end of IIFE function
})(jQuery);