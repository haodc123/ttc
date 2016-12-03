$(document).ready(function() {
	setInterval('swt_sr1()', 4500);
});
			function swt_sr1() {
              var sr1cur = jQuery('#sr1 .div_area_content .ul_area_content li.show');
              var sr1next = sr1cur.next();
              
              if(sr1next.length == 0) {
                sr1next = jQuery('#sr1 .div_area_content .ul_area_content li:first');
              };
              
              sr1cur.removeClass('show').addClass('hide');
              sr1next.css({opacity:0}).removeClass('hide').animate({opacity: 1}, 1500, function() {
                sr1next.addClass('show');
              });
            };