 $(window).on('load', function () {

	// alert("index.js is working!");
	
    

	// Animates in the index title h1.  The index paragraph then animates once the index h1 is fully animated in.
    $("#index_title").fadeIn({queue: false, duration: 1500}, "swing");
    $("#index_title").animate({letterSpacing: "0px"}, 1500, function () {
    	$("#index_p").fadeIn(700, "swing", function () {
    		$(".navbar_footer_index").animate({opacity: 1}, 1000);
    	});
    });

    // adjusts the page content to the navbar using the top margin of the page inside the content section depending on whether using is logged in or not
    var count = 0;
    links = $("#navlinks").find("li").length;
    $("#navbar_mobile_button").click(function() {
    	count++;
	    	if (count == 1) {
	    		if (links < 5) { 
	            	$(".index").animate({paddingTop: "19vh"}, 150, "swing");
	        	} else {
	        		$(".index").animate({paddingTop: "25vh"}, 150, "swing");
	        	}
	    	}
	    	if (count == 2) {
	            $(".index").animate({paddingTop: "13vh"}, 150, "swing");
	    		count = 0;
	    	}
    });

});

