var ismobile;

jQuery(document).ready(function() {
 	resize();
 	 setTimeout("checkmobile();",500);
});

function checkmobile(){
	var windowWidth = window.screen.width < window.outerWidth ?
                  window.screen.width : window.outerWidth;
                  ismobile = windowWidth < 760;
    resize();
}
function resize(){
	var $scrollingDiv = jQuery("#node-24 .page_left_image");
	if($scrollingDiv.length){
		if(!ismobile){
			pageH = document.documentElement.scrollHeight;	
			scrH = jQuery(window).scrollTop() + 150;
			if(((scrH) > (pageH - jQuery("#footer").height() - $scrollingDiv.height()))){
				scrH = (pageH - jQuery("#footer").height() - $scrollingDiv.height());
				$scrollingDiv.css("top",(scrH) + "px");
				$scrollingDiv.css("position","absolute");
			}else{
				$scrollingDiv.css("top","150px");
				$scrollingDiv.css("position","fixed");
			}
		}else{
			$scrollingDiv.css("top","0px");
			$scrollingDiv.css("position","relative");
		}
	}else{
		$scrollingDiv = jQuery(".node-type-news .sidebar-news");
		if($scrollingDiv.length){
			if(!ismobile){
				pageH = document.documentElement.scrollHeight;	
				scrH = jQuery(window).scrollTop() + 210;
				if(((scrH) > (pageH - jQuery("#footer").height() - $scrollingDiv.height()))){
					scrH = (pageH - jQuery("#footer").height() - $scrollingDiv.height());
					$scrollingDiv.css("top",(scrH) + "px");
					$scrollingDiv.css("position","absolute");
				}else{
					$scrollingDiv.css("top","210px");
					$scrollingDiv.css("position","fixed");
				}
			}else{
				$scrollingDiv.css("top","0px");
				$scrollingDiv.css("position","relative");
			}
		}
	}
	
	
	/*$scrollingDiv
                .stop()
                .animate({"top": (scrH) + "px"}, "easein" );*/
}


window.onscroll = function(event) {
	resize();
}