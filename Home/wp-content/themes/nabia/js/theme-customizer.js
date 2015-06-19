/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 * Things like site title, description, and background color changes.
 */

( function( $ ) {

	var list_font_weights = ['100', '100italic', '200', '200italic', '300', '300italic', '400', '400italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'];
	

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-title a, .site-description, .navbar-default .navbar-brand' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-title a, .site-description, .navbar-default .navbar-brand' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	// Hook into background color/image change and adjust body class value as needed.
	wp.customize( 'background_color', function( value ) {
		value.bind( function( to ) {
			var body = $( 'body' );

			if ( ( '#ffffff' == to || '#fff' == to ) && 'none' == body.css( 'background-image' ) )
				body.addClass( 'custom-background-white' );
			else if ( '' == to && 'none' == body.css( 'background-image' ) )
				body.addClass( 'custom-background-empty' );
			else
				body.removeClass( 'custom-background-empty custom-background-white' );
		} );
	} );
	wp.customize( 'background_image', function( value ) {
		value.bind( function( to ) {
			var body = $( 'body' );

			if ( '' != to )
				body.removeClass( 'custom-background-empty custom-background-white' );
			else if ( 'rgb(255, 255, 255)' == body.css( 'background-color' ) )
				body.addClass( 'custom-background-white' );
			else if ( 'rgb(230, 230, 230)' == body.css( 'background-color' ) && '' == _wpCustomizeSettings.values.background_color )
				body.addClass( 'custom-background-empty' );
		} );
	} );


	/* font family */

	wp.customize( "nabia_body_font_family", function(value){
		
		value.bind(function(newval){

			var fontFamily = newval;
			var fontFamilyUrl = newval.split(" ").join("+");
			var googleFontPath = "http://fonts.googleapis.com/css?family="+fontFamilyUrl+":"+list_font_weights.join(); +"";
			var googleFontSource = "<link id='gwfc-body-font-family' href='"+googleFontPath+"' rel='stylesheet' type='text/css'>";					
			var checkLink = $("head").find("#gwfc-body-font-family").length;
			
			if (checkLink > 0) {

				$("head").find("#gwfc-body-font-family").remove();
				$("head").find("#gwfc-body-style").remove();
				$("head").append(googleFontSource);
			
			} else {
			
				$("head").append(googleFontSource);
			
			}	

			$("body").css("font-family", "'"+fontFamily+"', sans-serif", "important");

			if(fontFamily == 'default'){
				
				$("head").find("#gwfc-body-font-family").remove();
				$("head").find("#gwfc-body-style").remove();
				$("body").css("font-family", "");
				$("body").css("font-weight", "");
				$("body").css("font-style", "");

			}

		});

	});

	wp.customize( "nabia_widget_titles_font_family", function(value){
		
		value.bind(function(newval){

			var fontFamily = newval;
			var fontFamilyUrl = newval.split(" ").join("+");
			var googleFontPath = "http://fonts.googleapis.com/css?family="+fontFamilyUrl+":"+list_font_weights.join(); +"";
			var googleFontSource = "<link id='gwfc-body-font-family' href='"+googleFontPath+"' rel='stylesheet' type='text/css'>";					
			var checkLink = $("head").find(".widgettitle").length;
			
			if (checkLink > 0) {

				$("head").find(".widgettitle").remove();
				$("head").find(".widgettitle").remove();
				$("head").append(googleFontSource);
			
			} else {
			
				$("head").append(googleFontSource);
			
			}	

			$(".widgettitle").css("font-family", "'"+fontFamily+"', sans-serif", "important");

			if(fontFamily == 'default'){
				
				$("head").find(".widgettitle").remove();
				$("head").find(".widgettitle").remove();
				$("body").css("font-family", "");
				$("body").css("font-weight", "");
				$("body").css("font-style", "");

			}

		});

	});

	wp.customize( "nabia_post_titles_font_family", function(value){
		
		value.bind(function(newval){

			var fontFamily = newval;
			var fontFamilyUrl = newval.split(" ").join("+");
			var googleFontPath = "http://fonts.googleapis.com/css?family="+fontFamilyUrl+":"+list_font_weights.join(); +"";
			var googleFontSource = "<link id='gwfc-body-font-family' href='"+googleFontPath+"' rel='stylesheet' type='text/css'>";					
			var checkLink = $("head").find(".widgettitle").length;
			
			if (checkLink > 0) {

				$("head").find(".post-title").remove();
				$("head").find(".post-title").remove();
				$("head").append(googleFontSource);
			
			} else {
			
				$("head").append(googleFontSource);
			
			}	

			$(".post-title").css("font-family", "'"+fontFamily+"', sans-serif", "important");

			if(fontFamily == 'default'){
				
				$("head").find(".post-title").remove();
				$("head").find(".post-title").remove();
				$("body").css("font-family", "");
				$("body").css("font-weight", "");
				$("body").css("font-style", "");

			}

		});

	});

	wp.customize( "nabia_menu_font_family", function(value){
		
		value.bind(function(newval){

			var fontFamily = newval;
			var fontFamilyUrl = newval.split(" ").join("+");
			var googleFontPath = "http://fonts.googleapis.com/css?family="+fontFamilyUrl+":"+list_font_weights.join(); +"";
			var googleFontSource = "<link id='gwfc-body-font-family' href='"+googleFontPath+"' rel='stylesheet' type='text/css'>";					
			var checkLink = $("head").find(".widgettitle").length;
			
			if (checkLink > 0) {

				$("head").find("#top-menu-nav").remove();
				$("head").find("#top-menu-nav").remove();
				$("head").append(googleFontSource);
			
			} else {
			
				$("head").append(googleFontSource);
			
			}	

			$("#top-menu-nav").css("font-family", "'"+fontFamily+"', sans-serif", "important");

			if(fontFamily == 'default'){
				
				$("head").find("#top-menu-nav").remove();
				$("head").find("#top-menu-nav").remove();
				$("body").css("font-family", "");
				$("body").css("font-weight", "");
				$("body").css("font-style", "");

			}

		});

	});

	/* General */
	// Header radius
	wp.customize( 'nabia_header_radius', function( value ) {
		value.bind( function( to ) {
			$( '.header-background' ).css( { 'border-radius': to + 'px' } );
		});
	});

	// Header border width
	wp.customize( 'nabia_header_border_width', function( value ) {
		value.bind( function( to ) {
			$( '.header-background' ).css( { 'border-width': to + 'px' } );
		});
	});

	// Header border color
	wp.customize( 'nabia_header_border_color', function( value ) {
		value.bind( function( to ) {
			$( '.header-background' ).css( { 'border-color': to } );
		});
	});	

	// Display breadcrumbs
	wp.customize( 'nabia_bcrumbs_display', function( value ) {
		value.bind( function( to ) {
			if( to === true ) {
				$( '#breadcrumbs-nav' ).css('display', 'none');
			} else {
				$( '#breadcrumbs-nav' ).css('display', 'block');
			}
		});
	});

	// Enable / disable post format icons
	wp.customize( 'nabia_post_format_icons', function( value ) {
		value.bind( function( to ) {
			if( to === 'format-icon-enabled' ) {
				$( '.entry-post-format' ).css('display', 'block');
			} else {
				$( '.entry-post-format' ).css('display', 'none');
			}
		});
	});


	// Display brand in menu
	wp.customize( 'nabia_menu_brand', function( value ) {
		value.bind( function( to ) {
			var static_menu = $( "body" ).hasClass( "menu-static-top" )
			if( static_menu === true ) {
				if( to === 'none' ) {
					$( '.navbar-brand' ).css('display', 'none');
				} else {
					$( '.navbar-brand' ).css('display', 'block');
				}
			} else {
				$( '.navbar-brand' ).css('display', 'none');
			}
		});
	});

	/* Custom colors */
	// Site title text color

	// Body text
	wp.customize( 'nabia_body_txt_color', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( { 'color': to } );
		});
	});
	// Body links
	wp.customize( 'nabia_body_link_color', function( value ) {
		value.bind( function( to ) {
			$( 'body a,body a:visited' ).css( { 'color': to } );
		});
	});
	// Post format icon
	wp.customize( 'nabia_ficons_color', function( value ) {
		value.bind( function( to ) {
			$( '.post-format-icon' ).css( { 'color': to } );
		});
	});
	// Audio player
	wp.customize( 'nabia_audioplayer_color', function( value ) {
		value.bind( function( to ) {
			$( '.mejs-embed, .mejs-embed body, .mejs-container .mejs-controls' ).css( { 'background-color': to } );
		});
	});
	// Buttons background
	wp.customize( 'nabia_buttons_bg_color', function( value ) {
		value.bind( function( to ) {
			$( 'button, input[type="button"], input[type="reset"], input[type="submit"], .reply, .reply:hover, .tags span, .post-author-meta .nav-tabs > li.active > a, .post-author-meta .nav-tabs > li.active > a:hover, .post-author-meta .nav-tabs > li.active > a:focus, .post-author-meta .nav-tabs .active a, .nav.recent-posts-tabs .active, .nav.recent-posts-tabs li a:focus, .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus, .post-author-meta .nav-tabs > li.active > a, .post-author-meta .nav-tabs > li.active > a:hover, .post-author-meta .nav-tabs > li.active > a:focus, .post-author-meta .nav-tabs .active a, .nav.recent-posts-tabs .active, .nav.recent-posts-tabs li a:focus, .social-profiles li:hover, #wp-calendar thead tr' ).css( { 'background-color': to } );
		});
	});
	// Buttons text
	wp.customize( 'nabia_buttons_text_color', function( value ) {
		value.bind( function( to ) {
			$( 'button, input[type="button"], input[type="reset"], input[type="submit"], .reply, .reply:hover, .tags span, .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus, .post-author-meta .nav-tabs > li.active > a, .post-author-meta .nav-tabs > li.active > a:hover, .post-author-meta .nav-tabs > li.active > a:focus, .post-author-meta .nav-tabs .active a, .nav.recent-posts-tabs .active, .nav.recent-posts-tabs li a:focus' ).css( { 'color': to } );
		});
	});
	// Buttons border
	wp.customize( 'nabia_buttons_border_color', function( value ) {
		value.bind( function( to ) {
			$( 'button, input[type="button"], input[type="reset"], input[type="submit"], .reply, .reply:hover, .tags span, .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus, .car-prev:hover, .car-next:hover' ).css( { 'border-color': to } );
		});
	});
	// Menu background
	wp.customize( 'nabia_menu_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '.menu-static-top #mainmenu .navbar-default' ).css( { 'background-color': to } );
		});
	});
	// Menu border
	wp.customize( 'nabia_menu_border_color', function( value ) {
		value.bind( function( to ) {
			$( '.menu-static-top #mainmenu .navbar-default' ).css( { 'border-color': to } );
		});
	});
	// Menu tabs background
	wp.customize( 'nabia_menu_tabs_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '#mainmenu .menu-item a, #mainmenu .menu-item a:visited' ).css( { 'background-color': to } );
		});
	});
	// Menu disabled text
	wp.customize( 'nabia_disabled_text_color', function( value ) {
		value.bind( function( to ) {
			$( '#mainmenu .dropdown-menu > .disabled a' ).css( { 'color': to } );
		});
	});
	// Menu divider
	wp.customize( 'nabia_menu_divider_color', function( value ) {
		value.bind( function( to ) {
			$( '#mainmenu .dropdown-menu .divider' ).css( { 'background-color': to } );
		});
	});
	// Submenu border
	wp.customize( 'nabia_submenu_bottom_border', function( value ) {
		value.bind( function( to ) {
			$('#mainmenu .open > .dropdown-menu').css('border-bottom', '3px solid ' + to);
		});
	});
	// Menu text
	wp.customize( 'nabia_menu_text_color', function( value ) {
		value.bind( function( to ) {
			$( '#mainmenu .menu-item a, #mainmenu .menu-item a:visited, #mainmenu .dropdown-menu > li > a' ).css( { 'color': to } );
		});
	});
	// Menu tab hover, active
	wp.customize( 'nabia_menu_tab_hover', function( value ) {
		value.bind( function( to ) {
			$( '#mainmenu .navbar-nav .active a, #mainmenu .navbar-default .navbar-nav > li > a:hover, #mainmenu .navbar-default .navbar-nav > li > a:focus' ).css( { 'background-color': to } );
		});
	});
	// Submenu background color before
	wp.customize( 'nabia_submenu_bg_color', function( value ) {
		value.bind( function( to ) {	
			var sbcol = 'transparent transparent ' + to;
			$( '.menu-static-top .navbar-left .open > .dropdown-menu:before, .menu-centered-pills #mainmenu .open > .dropdown-menu:before, .menu-static-top .navbar-right .open > .dropdown-menu:before' ).css( { 'border-color': sbcol } );
		});
	});
	// Submenu background color
	wp.customize( 'nabia_submenu_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '#mainmenu .dropdown-menu' ).css( { 'background-color': to } );
		});
	});
	// Featured carousel background
	wp.customize( 'nabia_carousel_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '#featured-carousel, .carousel-navigation' ).css( { 'background-color': to } );
		});
	});
	// Featured carousel item hover
	wp.customize( 'nabia_carousel_item_hover', function( value ) {
		value.bind( function( to ) {
			$( '.carousel-item .mask' ).css( { 'background-color': to } );
		});
	});
	// Breadcrumbs background
	wp.customize( 'nabia_bcrumbs_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '.breadcrumb' ).css( { 'background-color': to } );
		});
	});
	// Breadcrumbs text
	wp.customize( 'nabia_bcrumbs_txt_color', function( value ) {
		value.bind( function( to ) {
			$( '.breadcrumb > .active' ).css( { 'color': to } );
		});
	});
	// Breadcrumbs links
	wp.customize( 'nabia_bcrumbs_link_color', function( value ) {
		value.bind( function( to ) {
			$( '.breadcrumb li a, .breadcrumb li a:visited' ).css( { 'color': to } );
		});
	});
	// Sidebar background
	wp.customize( 'nabia_sidebar_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '.sidebg' ).css( { 'background-color': to } );
		});
	});
	// WIdget title
	wp.customize( 'nabia_widget_title_color', function( value ) {
		value.bind( function( to ) {
			$( '.widgettitle' ).css( { 'color': to } );
		});
	});
	// Widget background
	wp.customize( 'nabia_widget_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '.widget' ).css( { 'background-color': to } );
		});
	});
	// Widget icons
	wp.customize( 'nabia_widget_icons_color', function( value ) {
		value.bind( function( to ) {
			$( '.widget.widget_pages li:before, .widget.widget_categories li:before, .widget.widget_archive li:before, .widget.widget_recent_comments li:before, .tagcloud a:before' ).css( { 'color': to } );
		});
	});
	// Sidebar text
	wp.customize( 'nabia_sidebar_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.sidebg' ).css( { 'color': to } );
		});
	});
	// Sidebar links
	wp.customize( 'nabia_sidebar_link_color', function( value ) {
		value.bind( function( to ) {
			$( '.sidebg a, .sidebg a:visited' ).css( { 'color': to } );
		});
	});
	// Footer background
	wp.customize( 'nabia_footer_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '#footer' ).css( { 'background-color': to } );
		});
	});	
	// Footer text
	wp.customize( 'nabia_footer_txt_color', function( value ) {
		value.bind( function( to ) {
			$( '#footer' ).css( { 'color': to } );
		});
	});		
	// Footer links
	wp.customize( 'nabia_footer_link_color', function( value ) {
		value.bind( function( to ) {
			$( '#footer a, #footer a:visited' ).css( { 'color': to } );
		});
	});
	// Footer widgets title
	wp.customize( 'nabia_footer_widget_title', function( value ) {
		value.bind( function( to ) {
			$( '.f-widgettitle' ).css( { 'color': to } );
		});
	});
	// Footer border
	wp.customize( 'nabia_footer_border_color', function( value ) {
		value.bind( function( to ) {
			$('#footer-copy').css('border-top', '2px solid ' + to);
		});
	});
	// Footer widgets title border
	wp.customize( 'nabia_footerw_border_color', function( value ) {
		value.bind( function( to ) {
			$('.f-widgettitle > span').css('border-bottom', '1px solid ' + to);
		});
	});				
	// Footer bottom background
	wp.customize( 'nabia_footer_bottom_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '#footer-copy' ).css( { 'background-color': to } );
		});
	});
	// Footer bottom text
	wp.customize( 'nabia_footer_bottom_text_color', function( value ) {
		value.bind( function( to ) {
			$( '#footer-copy' ).css( { 'color': to } );
		});
	});	
	// Footer bottom links
	wp.customize( 'nabia_footer_bottom_link_color', function( value ) {
		value.bind( function( to ) {
			$( '#footer-copy a, #footer-copy a:visited' ).css( { 'color': to } );
		});
	});

	/* Footer */
	// Footer copyright
	wp.customize( 'nabia_footer_copyright', function( value ) {
		value.bind( function( to ) {
			$( '.copyrights' ).text( to );
		});
	});


} )( jQuery );
