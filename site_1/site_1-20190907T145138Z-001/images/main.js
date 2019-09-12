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