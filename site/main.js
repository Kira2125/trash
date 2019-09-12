	
	jQuery(document).ready(function(){
		"use strict";
		$('#slider-carousel').carouFredSel({
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
		
		if ($(window).width() < 1000) {
			$('.contacts-area .col-xs-12').css("text-align", "center");
			$('.contacts-area .col-xs-12').css("padding", "30px");
			$('.contacts-area .col-xs-12').css("font-size", "30px");
			$('.contacts-area .col-xs-12 .but').css("font-size", "50px");
			$('.contacts-area .col-xs-12 span').css("font-size", "40px");
			$('.contacts-area .col-xs-12 span').css("padding-top", "30px");
			$('#colash').css("margin-left", "0");
			$('.work-icon').css("margin-right", "200px");
			$('header').css("display", "none");
			$('.slider #slider-carousel').css("font-size", "40px");
			$('.slider #slider-carousel i').css("font-size", "70px");
			$('.slider #slider-carousel h2, .slider #slider-carousel .bnt').css("font-size", "70px");
			$('#intro').css("font-size", "30px");
			$('#intro h2, #intro h3').css("font-size", "40px");
			$('#intro h2').css("margin-bottom", "40px");
			$('#feature').css("font-size", "30px");
			$('#feature h2, #feature h3').css("font-size", "40px");
			$('.work-section').css("font-size", "30px");
			$('.work-section h2, .work-section h3').css("font-size", "40px");
			$('#testimonials').css("font-size", "30px");
			$('#testimonials h2, #testimonials h4').css("font-size", "40px");
			$('#testimonials #carousel-testimonials').css("font-size", "60px");
			$('.team-area').css("font-size", "30px");
			$('.team-area .team-social-network i').css("font-size", "55px");
			$('.team-area .col-sm-12').css("margin-bottom", "80px");
			$('.team-area .team-social-network a').css("margin-left", "70px");
			$('.team-area .team-social-network a').css("margin-right", "70px");
			$('.download-area').css("font-size", "30px");
			
		}
		if ($(window).width() < 1900) {
			$('.single-feature').css("border-right", "0");
			$('.single-feature').css("border-bottom", "0");
		 }
	})