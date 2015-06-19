(function($) {

	var nabia_option_vars = nabia_vars.replace(/&quot;/g, '"');
	var nabia_opt = jQuery.parseJSON(nabia_option_vars);

	// Go to top arrow
	$("a[href='#top']").click(function() {
  		$("html, body").animate({ scrollTop: 0 }, "slow");
  		return false;
	});

	// Trigger Pretty Photo
	if(jQuery().prettyPhoto) {
		$("a[data-gal^='prettyPhoto']").prettyPhoto({hook: 'data-gal'});
	}

	// Trigger Owl Carousel
	if(jQuery().owlCarousel) {

		// Featured content carousel
		var owl = $("#content-carousel");

		owl.owlCarousel({
			'items' : 5,
			'autoPlay': nabia_opt.owl_carousel.autoplay == "true" ? true : false,
			'stopOnHover' : nabia_opt.owl_carousel.stophover == "true" ? true : false,
			'mouseDrag' : nabia_opt.owl_carousel.mousedrag == "true" ? true : false,
			'touchDrag' : nabia_opt.owl_carousel.touchdrag == "true" ? true : false,
			'pagination' : nabia_opt.owl_carousel.pagination == "true" ? true : false
			//'singleItem' : true
			});

		 // Custom Navigation Events
		$(".car-prev").click(function(){
			owl.trigger('owl.prev');
		});
		$(".car-next").click(function(){
			owl.trigger('owl.next');
		});

		// About author widget
		var author_slider = $(".about-author-slider");

        author_slider.each( function() {
            var $aboutcarousel = $(this);
            $aboutcarousel.owlCarousel({
                autoPlay : $aboutcarousel.data("autoplay"),
                'singleItem': true,
                'pagination': false
            });
        });
		 // Custom Navigation Events
		$(".anav-prev").click(function(){
			author_slider.trigger('owl.prev');
		});
		$(".anav-next").click(function(){
			author_slider.trigger('owl.next');
		});
	  

		// Related posts carousel
		var owlRelated = $("#related-posts-carousel");

		owlRelated.owlCarousel({
			'items' : 3,
			'autoPlay': false,
			'mouseDrag' : true,
			'touchDrag' : true,
			'pagination' : false
			});

		 // Custom Navigation Events
		
		$(".relatedcar-prev").click(function(){
			owlRelated.trigger('owl.prev');
		});
		$(".relatedcar-next").click(function(){
			owlRelated.trigger('owl.next');
		});

	}

	// Make videos and iframes responsive
	$('#content iframe,#content embed').each(function() {
		$(this).wrap('<div class="flex-frame"></div>');
	});

	// Equal columns height for IE 9 and lower
	if(jQuery().matchHeight) {
	 	
		$(function() {
			// apply matchHeight to each item container's items
			$('.main-content').each(function() {
				$(this).children('.sidebg, .middle-col').matchHeight();
			});
		});
	}

	/* Tooltips */
	$('.post-format-icon').tooltip();
	$('.pagination li a').tooltip();
	$('.author-social-icons li a').tooltip();
	$('.author-name-wrap .website-link').tooltip();
	$('.social-buttons li a').tooltip();


   	// Add slideup & fadein animation to Bootstrap dropdown menu
   	$('.dropdown').on('show.bs.dropdown', function(e){
  		var $dropdown = $(this).find('.dropdown-menu');
      	var orig_margin_top = parseInt($dropdown.css('margin-top'));
      	$dropdown.css({'margin-top': (orig_margin_top + 10) + 'px', opacity: 0}).animate({'margin-top': orig_margin_top + 'px', opacity: 1}, 300, function(){
         	$(this).css({'margin-top':''});
      	});
   	});

   	// Add slidedown & fadeout animation to Bootstrap dropdown menu
   	$('.dropdown').on('hide.bs.dropdown', function(e){
      	var $dropdown = $(this).find('.dropdown-menu');
      	var orig_margin_top = parseInt($dropdown.css('margin-top'));
      	$dropdown.css({'margin-top': orig_margin_top + 'px', opacity: 1, display: 'block'}).animate({'margin-top': (orig_margin_top + 10) + 'px', opacity: 0}, 300, function(){
         	$(this).css({'margin-top':'', display:''});
      	});
   	});

   /* Increase and decrease font size */
  	$('#incfont').click(function() {   
        curSize= parseInt($('.entry-content').css('font-size')) + 2;
  		if( curSize <= 24 )
   			$('.entry-content').css('font-size', curSize);
    }); 
  	$('#decfont').click(function() {   
        curSize= parseInt($('.entry-content').css('font-size')) - 2;
  		if( curSize >= 10 )
        	$('.entry-content').css('font-size', curSize);
    });


})(jQuery);



// Initiate Wow.js
new WOW().init();