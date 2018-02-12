<div class="blog">

<?php 
foreach($query->result() as $row) {
	if ($query->num_rows() > 0) {
		echo "<center><h1 id='blog_title' class='title_h1'>".$row->page_headline."</h1></center>";
		echo $row->page_content;
		echo "<a class='alt_link' href='webpages/blog'>Back to blog</a>";
		echo "<p class='post_info'>Posted by ".$row->first_name." on Tuesday, August 8, 2017<p>";
	}
}
?>

</div>

<script src="assets/js/navbar.js"></script>