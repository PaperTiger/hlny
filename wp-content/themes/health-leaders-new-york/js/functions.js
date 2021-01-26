;(function($, window, document, undefined) {
	var $win = $(window);
	var $doc = $(document);
	var headerHeight;

	$doc.ready(function() {
		
		equalize();
		headerHeight = $('.header').outerHeight();

		$('.fullscreen-image').fullscreener();

		$('.nav > ul').clone().insertAfter($('.nav-dropdown .search'))
		$('.nav-secondary li:nth-child(3) a').clone().insertAfter($('.nav-dropdown .search + ul'))
		$('.nav-btn').clone().insertAfter($('.nav-dropdown .search + ul + a'))
		$('.nav-secondary').clone().insertAfter($('.nav-dropdown .nav-btn'));

		$('.custom-gallery-shortcode').wrapInner('<ul></ul>');
		$('.custom-gallery-shortcode a').each(function() {
			var $this = $(this);
			var $img = $this.find('img:eq(0)');
			var src = $img.attr('src');

			$this.attr('style', "background-image: url('" + src + "')");
			$img.removeAttr('src').attr('data-original', src);
		});

		$('.section-gallery').each(function(){
			$(this).find('ul').magnificPopup({
				delegate: 'a',
				type:'image',
				closeBtnInside: false,
				gallery: {
				 	enabled: true,
					preload: [0,2],
					navigateByImgClick: true,
				},
				type: 'image',
				gallery: {enabled: true},
				image: {
					titleSrc: function(item) {
						var content = '';
						
						if (item.el.attr('title')) {
							content += item.el.attr('title');
						}

						if (item.el.attr('data-description')) {
							content += '<span class=\"mfp-description\">' + item.el.attr('data-description') +'</span>';
						}
						
						return content;
					},
					cursor: 'mfp-zoom-out-cur', // Class that adds zoom cursor, will be added to body. Set to null to disable zoom out cursor. 
					tError: '<a href="%url%">The image</a> could not be loaded.' // Error message
				},
				preloader: true
			});
		});


		$('.sponsor-form-link').magnificPopup({
			items: {
				src: $('#sponsorship-form'),
				type: 'inline'
			}



		})

		$('.scroll-to-sponsors').on('click', function(e) {

			e.preventDefault();
			var offset = 20;
		    $('html, body').animate({
		        scrollTop: $("#sponsors").offset().top - $('.header').height()
		    }, 2000);	

		})

		// Load More
		$('.link-load-more').on('click', function(e) {
			e.preventDefault();  
	        var toLoad = $(this).attr('href');

			setTimeout( function() {
				loadMoreContent(toLoad);
			},300)
		});

		$('.intro .btn-green-play').magnificPopup({
			items: {
			    src: '.intro-video',
			    midClick: true,
			    type: 'inline'
			}
		});

		$('img.lazy').lazyload({
			effect : "fadeIn"
		});

		$('.header .search-outer > a').on('click', function (e){
			e.preventDefault();
			$(this).parents('.header').toggleClass('search-visible');
		});

		$('.link-scroll-top').click(function(){
			$('html, body').animate({scrollTop : 0}, 800);
			return false;
		});

		$('.intro-nav a[href^="#"]').on('click', function (e) {
		    e.preventDefault();

		    var parent = $(this).parent();
		    parent.siblings().removeClass('active')
		    parent.addClass('active');
		    var target = this.hash;
		    var $target = $(target);

		    $('html, body').animate({scrollTop : $target.offset().top - headerHeight}, 800);
		});

		(function(){
		    var activeTabClass = 'current'
		    
		    $('.tabs-nav a').on('click', function (e) {
		        var $tabLink = $(this);
		        var $targetTab = $($tabLink.attr('href'));
		 
		        $tabLink
		            .parent()
		            .add($targetTab)
		            .addClass(activeTabClass)
		                .siblings()
		                .removeClass(activeTabClass);
		        
		        e.preventDefault();
		    });
		})();

		$('.section-gallery li a').each(function(){
			var currentImage = $(this).find('img').attr('data-original')
			$(this).css('background-image', 'url('+currentImage+')');
		});

		$('.link-nav').on('click', function (e){
			e.preventDefault();
			$(this).parents('.wrapper').toggleClass('nav-visible');
			$('.sub-menu-visible').removeClass('sub-menu-visible');
		});

		$('.btn-menu').on('click', function (event) {
		    $(this).toggleClass('active');  
		    $('.nav-toggle').toggleClass('active');  
		    $('.nav-dropdown').toggleClass('active');  
		    
		    //Show/hide your navigation here
		    
		    event.preventDefault();
		});

		function homeSponsorsAnimation() {
			var items = $('.section-logos-slide');
			if (!items.length) {
				return false;
			}

			var animationSpeed = "fast";
			var animationTimeout = 6000;

		    setTimeout(function() {
		        requestAnimationFrame(homeSponsorsAnimation);
		        var currItem = items.filter(':visible');
		        var currItemIndex = items.index(currItem);
		        var nextItemIndex = currItemIndex == items.length - 1 ? 0 : currItemIndex + 1;
		        if ( currItemIndex == nextItemIndex ) {
		        	return false;
		        }

		        currItem.fadeOut(animationSpeed, function() {
		        	items.eq(nextItemIndex).fadeIn(animationSpeed);
		        });
		    }, animationTimeout);
		};

		homeSponsorsAnimation();
	});

	var equalize = function() {
		var $el, currentTallest = 0,
			currentRowStart = 0,
			rowDivs = new Array();
			$('.event, .sponsorship-levels .sponsorship-level-row:first-child').height('auto')
			$('.event, .sponsorship-levels .sponsorship-level-row:first-child').each(function() {
				if ($el = $(this), $($el).height("auto"), topPostion = $el.position().top, currentRowStart != topPostion) {
					for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) rowDivs[currentDiv].height(currentTallest);
					rowDivs.length = 0, currentRowStart = topPostion, currentTallest = $el.height(),
						rowDivs.push($el);
				} else rowDivs.push($el), currentTallest = currentTallest < $el.height() ? $el.height() : currentTallest;
					for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) rowDivs[currentDiv].height(currentTallest);
		});
	}

	var ajax_loading = false;
	function loadMoreContent(source) {

		if ( !ajax_loading ) {

			ajax_loading = true;
			$.ajax({
				cache: false,
				url:source,
				success: function(data){
					event.preventDefault();
					newLocation = this.href;
					var $newContent = $(data).find('.section-events');

					var next_posts_link = $(data).find('.section-foot a');
					if ( next_posts_link.length ) {
						$('.link-load-more').attr('href', next_posts_link.attr('href'));
					} else {
						$('.link-load-more').remove();
					}
					
					$newContent.appendTo( $('.section-past-events' ))

					$newContent.css('opacity', '0');
					$newContent.animate({
						opacity: "1"
					});

					initNewContent()
					setTimeout( function() {
						initNewContent();
					}, 300)
					
					ajax_loading = false;
				}
			})
		}
	}

	function initNewContent($selector){
		$('.fullscreen-image').fullscreener();
		equalize();
	};

	$win.on('load resize', function(){
		equalize();

		headerHeight = $('.header').outerHeight();
		if ( $('#wpadminbar').length ) {
			headerHeight -= $('#wpadminbar').outerHeight();
		}

		$('.wrapper').css('padding-top', headerHeight + 'px');
	});

	$win.on('scroll', function() {
		
		if ( ( $('.section-events-listing .section-foot .link-load-more').length ) && ($('.section-events-listing .section-foot .link-load-more').offset().top + $('.section-events-listing .section-foot').height()) < $win.scrollTop() + $win.height() - $('.section-events-listing .section-foot').height() ) {

			if ( !ajax_loading ) {

		        var toLoad = $('.link-load-more').attr('href');

				setTimeout( function() {
					loadMoreContent(toLoad);
				},300)
				
			}
			
		};
			
	})
})(jQuery, window, document);

// requestAnimationFrame polyfill
(function() {
    var lastTime = 0;
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame']
                                   || window[vendors[x]+'CancelRequestAnimationFrame'];
    }
 
    if (!window.requestAnimationFrame)
        window.requestAnimationFrame = function(callback, element) {
            var currTime = new Date().getTime();
            var timeToCall = Math.max(0, 16 - (currTime - lastTime));
            var id = window.setTimeout(function() { callback(currTime + timeToCall); },
              timeToCall);
            lastTime = currTime + timeToCall;
            return id;
        };
 
    if (!window.cancelAnimationFrame)
        window.cancelAnimationFrame = function(id) {
            clearTimeout(id);
        };
}());
