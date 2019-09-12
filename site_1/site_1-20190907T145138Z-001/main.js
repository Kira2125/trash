jQuery(document).ready(function(){
		"use strict";
		$('#slider-carousel').carouFredSel({
			prev: '#foo2_prev',
          	next: '#foo2_next',
			responsive: true,
			width: '100%',
			circular: true,
			scroll:{
				items: 1,
				duration: 500,
				pauseOnHover: true
			},
			auto: true,
			items:
			{
				visible:{
					min: 1,
					max: 1
				},
				height: "variable"
			},
			pagination:{
				container:".sliderpager",
				pageAnchorBuilder: false
			}
		});
		$(window).scroll(function(){
			var top = $(window).scrollTop();
			if(top>=60) {
				$("header").addClass('secondary');
			}
			else if($("header").hasClass('secondary')){
				$("header").removeClass('secondary');
			} 
		})
		$(window).scroll(function(){
			var top = $(window).scrollTop();
			if(top>=60) {
				$(".prev").addClass('secondary_prev');
			}
			else if($(".prev").hasClass('secondary_prev')){
				$(".prev").removeClass('secondary_prev');
			} 
		})
		$(window).scroll(function(){
			var top = $(window).scrollTop();
			if(top>=60) {
				$(".next").addClass('secondary_next');
			}
			else if($(".next").hasClass('secondary_next')){
				$(".next").removeClass('secondary_next');
			} 
		})
		$(window).on("scroll", function() {
		var scrollHeight = $(document).height();
		var scrollPosition = $(window).height() + $(window).scrollTop();
		if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
		    $(".footer").addClass('addfooter');
		} else if($(".footer").hasClass('addfooter')){
				$(".footer").removeClass('addfooter');
			} 
		});
		$(window).scroll(function(){
		if ($(window).width() < 1000) {
			$('.descr').css("display", "none");
			
			var top = $(window).scrollTop();
			if(top>=3700) {
				$(".footer").addClass('addfooter');
			}
			else if($(".footer").hasClass('addfooter')){
				$(".footer").removeClass('addfooter');
			} 
		}
		})
		if ($(window).width() < 1000) {
			$('.slider a').css("font-size", "30px");
			$('.slider-carousel .text').css("font-size", "30px");
			$('.feature').css("font-size", "35px");
		 }
		
		$('.li-library li .limg').mouseover(function(){
			var getImageLink = $(this).css("background-image");
		
			$('.library').css("background-image", "linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8))," + getImageLink);
		})
		$('.slider-carousel').carouFredSel({
			prev: '#foo1_prev',
          	next: '#foo1_next',
			responsive: true,
			width: '100%',
			circular: true,
			scroll:{
				items:
            		{
                
                visible:
                    	{
                        min: 1,
                        max: 3
                    	}
            		},
            	easing          : "quadratic",
            	duration        : 700,
            	pauseOnHover: true
					},
			auto: true,
			items:
			{
				width: 551,
            	visible:
                {
                    min: 1,
                    max: 5
                },
				height: "variable"
			},
			
			swipe: {
                onMouse: true,
                onTouch: true
            }   
		});
		
		
	})
