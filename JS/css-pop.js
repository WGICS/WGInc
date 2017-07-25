function toggle(div_id) {
	var el = document.getElementById(div_id);
    el.style.visibility = "visible";
}

function closepop(div_id) {
    var el = document.getElementById(div_id);
    el.style.visibility = "hidden";	
}

function blanket_size(popUpDivVar) {
	if (typeof window.innerWidth != 'undefined') {
		viewportheight = window.innerHeight;
	} else {
		viewportheight = document.documentElement.clientHeight;
	}
	if ((viewportheight > document.body.parentNode.scrollHeight) && (viewportheight > document.body.parentNode.clientHeight)) {
		blanket_height = viewportheight;
	} else {
		if (document.body.parentNode.clientHeight > document.body.parentNode.scrollHeight) {
			blanket_height = document.body.parentNode.clientHeight;
		} else {
			blanket_height = document.body.parentNode.scrollHeight;
		}
	}
	var blanket = document.getElementById('blanket');
	blanket.style.height = blanket_height + 'px';
	var popUpDiv = document.getElementById(popUpDivVar);
}
function window_pos(popUpDivVar) {
	if (typeof window.innerWidth != 'undefined') {
		viewportwidth = window.innerHeight;
	} else {
		viewportwidth = document.documentElement.clientHeight;
	}
	if ((viewportwidth > document.body.parentNode.scrollWidth) && (viewportwidth > document.body.parentNode.clientWidth)) {
		window_width = viewportwidth;
	} else {
		if (document.body.parentNode.clientWidth > document.body.parentNode.scrollWidth) {
			window_width = document.body.parentNode.clientWidth;
		} else {
			window_width = document.body.parentNode.scrollWidth;
		}
	}
	var popUpDiv = document.getElementById(popUpDivVar);
	window_width=window_width/2-200;//200 is half popup's width
}
function popup(windowname) {
	blanket_size(windowname);
	window_pos(windowname);
	toggle('blanket');
	toggle(windowname);		
}

function closepops(windowname) {
	
    closepop('blanket');
	closepop(windowname);		
}

$(document).ready(function(){
    $('.close').on("click", function() {
        closepop('blanket');
        closepop('ProSelect');
        closepop('MAHSSelect');
        closepop('MuscleSelect');
        closepop('SixSelect');
        closepop('SelfieSelect');
        closepop('PureSelect');
        closepop('SportSelect');
        closepop('StylistSelect');
    });
    
    $('#blanket').on("click", function() {
        closepop('blanket');
        closepop('ProSelect');
        closepop('MAHSSelect');
        closepop('MuscleSelect');
        closepop('SixSelect');
        closepop('SelfieSelect');
        closepop('PureSelect');
        closepop('SportSelect');
        closepop('StylistSelect');
    });
    
    $(document).keydown(function(e) {
        // ESCAPE key pressed
        if (e.keyCode == 27) {
            closepop('blanket');
            closepop('ProSelect');
            closepop('MAHSSelect');
            closepop('MuscleSelect');
            closepop('SixSelect');
            closepop('SelfieSelect');
            closepop('PureSelect');
            closepop('SportSelect');
            closepop('StylistSelect');
        }
    });
});