$(document).ready(function() {
	setInterval('swt_a1()', 3000);
});
			function swt_a1() {
              var cur = jQuery('#a1 .div_area_content .ul_area_content li.show');
              var next = cur.next();
              
              if(next.length == 0) {
                next = jQuery('#a1 .div_area_content .ul_area_content li:first');
              };
              
              cur.removeClass('show').addClass('hide');
              next.css({opacity:0}).removeClass('hide').animate({opacity: 1}, 1500, function() {
                next.addClass('show');
              });
            };