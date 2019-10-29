; (function($){
	$(document).ready(function(){
		//Featherlight popup
		/*$(".popup").each(function(){
			var image = $(this).find("img").attr("src");
			$(this).attr("href",image);
		});				  */

		//Tiny Slider
		var slider = tns({
			container: '.slider',
			speed: 300,
			autoplayTimeout: 3000,
			items: 1,
			autoplay: true,
			autoHeight: true,
			controls: false,
			nav: false,
			autoplayButtonOutput: false,
			slideBy: 'page',
		});		
	});
 
 })(jQuery);