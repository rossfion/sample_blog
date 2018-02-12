<center><h1 id="blog_title" class="title_h1">Blog</h1></center>

<div class="blog">
	<?php
	if ($query->num_rows() > 0) { 
		foreach($query->result() as $row) { ?>
			<div class="post_row" id="<?php echo "post_".$row->post_id; ?>">
			<?php if ($row->page_headline) {
				echo "<h2>".$row->page_headline."</h2>";
				echo $row->page_content;
				echo "<a class='read_more alt_link' href='".base_url().$row->page_url."'>More...</a>";
				echo "<p class='post_info'>Posted by ".$row->first_name." on Tuesday, August 8, 2017 | <a class='alt_link' href='".base_url().$row->page_url."'>Go to post</a></p>";
			} ?>
			</div>
		<?php } ?>
	<?php } ?> 
</div>

<script src="/assets/js/navbar.js"></script>
<script src="/assets/js/blog.js"></script>