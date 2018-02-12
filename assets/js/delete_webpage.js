$(document).ready(function() {

    $(".delete_webpage").click(function() {
    	var delete_website = confirm("Are you sure you want to delete this web page?");
    	if (delete_website == true) {
    		return true;
    	} else {
    		return false;
    	}
    });

});