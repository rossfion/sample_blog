<h1 class="title_h1">Welcome <?php echo $this->session->userdata("first_name"); ?>!</h1>

<?php 
$user_level = $this->session->userdata("user_level");
if ($user_level == "admin") {
	echo "<h3>You are an administrator</h3>";
} ?>

<h2>Content Management System</h2>

<table>
	<?php 
	if ($query->num_rows() > 0) {
		foreach($query->result() as $row) {

			$edit_url = base_url()."webpages/update/".$row->post_id;
			$delete_url = base_url()."webpages/delete/".$row->post_id;
			$page_headline = $row->page_headline;
		 ?>
	<tr>
		<td><?php echo $page_headline; ?></td>
		<td class="edit_delete"><a href="<?php echo $edit_url ?>">Edit</a></td>
		<td class="edit_delete"><a class="delete_webpage" href="<?php echo $delete_url ?>">Delete</a></td>
	</tr>
	<?php } ?>
<?php } ?>
</table>
<?php if ($query->num_rows() > 0) {
	echo "<a class='alt_link' id='create_link' href='".base_url()."webpages/create'>Create a page</a>";
	} else {
	echo "<p>You have no pages created yet</p>";
	echo "<a class='alt_link' id='create_link' href='".base_url()."webpages/create'>Create a page</a>";
	}
?>

<script src="/assets/js/navbar.js"></script>
<script src="/assets/js/delete_webpage.js"></script>