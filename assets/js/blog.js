$(document).ready(function() {
	
	// alert("blog.js is working!");
	$(".read_more").hide();

	for (var i = 1; i < 1000; i++ ) {
		if ($("#post_" + i + "").length) {
			count = $("#post_" + i + "").find("p").length;
			// alert(count);
			if (count > 3) {
				// alert("Post " + i + " has " + count + " paragraphs");
				for (var j = 3; j < 100; j++ ) {
					$("#post_" + i + " p:nth-of-type(" + j + ")").hide();
					$("#post_" + i + " .read_more").show();
				}
			$(".post_info").show();
			}
		}
	}

});