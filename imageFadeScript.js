(function($, window, document) {
	$(function()
		{
			var target;
			var target2;
			var trigger = 0;
			var texts = $('ul.SliderTexts li');
			var images = $('ul.SliderImages li');
	
			images.hide().first().show();
			texts.hide().first().show();
	
			function sliderResponse(target,target2) 
			{
				images.fadeOut(1000).eq(target).fadeIn(1000);
				texts.fadeOut(1000).eq(target2).fadeIn(1000);
			}
			
			$('#SliderButtonRight').click(function() {
				if(trigger==2)
					trigger=-1;
				trigger++;
				target = trigger;
				target2 = trigger;
				sliderResponse(target,target2);
				resetTiming();
			});
			$('#SliderButtonLeft').click(function() {
				if(trigger==0)
					trigger=3;
				trigger--;
				target = trigger;
				target2 = trigger;
				sliderResponse(target,target2);
				resetTiming();
			});
	
			function sliderTiming() {
				if(trigger==2)
					trigger=-1;
				trigger++;
				target = trigger;
				target2 = trigger;
				sliderResponse(target,target2);
			}
			
			var timingRun = setInterval(function() { sliderTiming(); },7000);
			
			function resetTiming() {
				clearInterval(timingRun);
				timingRun = setInterval(function() { sliderTiming(); },7000);
			}
		}
	);
}(window.jQuery, window, document));