jQuery(document).ready(function($){
	//Sticky Nav
	var main = $("#masthead");
	var content = $("#content");
	var totop = $("#totop");
	var hdr = $("#rslider").height();
	$(window).scroll(function(){
		if ($(this).scrollTop() > hdr){
			main.addClass("scroll");
			content.addClass("toppad");
			totop.addClass("show");
		} else{
			main.removeClass("scroll");
			content.removeClass("toppad");
			totop.removeClass("show");
		}
	});
	//Smooth Scroll
	$(function(){
	setTimeout(function(){
	if (location.hash){
		window.scrollTo(0,450);
		target = location.hash.split('#');
		smoothScrollTo($('#'+target[1]));
		}
	},1);
	$('a[href*=#]:not([href=#])').click(function(){
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname){
			smoothScrollTo($(this.hash));
			return false;
		}
	});
	function smoothScrollTo(target){
		var nav = $("#masthead").height();
		target = target.length ? target :$('[name=' + this.hash.slice(1) +']');
		if (target.length){
			$('html,body').animate({scrollTop:target.offset().top-nav},1200);
		}
	}
	});
	$(window).bind("mousewheel",function(){$("html,body").stop(true,false);});
	//End
});