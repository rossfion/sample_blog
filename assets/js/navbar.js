$(document).ready(function() {

    // alert("navbar.js working!");

	var count = 0;
    links = $("#navlinks").find("li").length;
    $("#navbar_mobile_button").click(function() {
    	count++;
    	if (count == 1) {
    		$(".content").animate({marginTop: "140px"}, 150, "swing");
    		$(".admin_panel").animate({marginTop: "145px"}, 150, "swing");
            if (links > 4) {
                $("#blog_title").animate({marginTop: "155px"}, 150, "swing");
            }
            if (links < 5) {
                $(".login").animate({marginTop: "-25px"}, 150, "swing");
            }
    	}
    	if (count == 2) {
    		$(".content").animate({marginTop: "0px"}, 350, "swing");
    		$(".admin_panel").animate({marginTop: "0px"}, 350, "swing");
            // $(".blog").animate({marginTop: "0px"}, 350, "swing");
            if (links > 4) {
                $("#blog_title").animate({marginTop: "0px"}, 150, "swing");
            }
            if (links < 5) {
                $(".login").animate({marginTop: "0px"}, 150, "swing");
            }
    		count = 0;
    	}
    });

});