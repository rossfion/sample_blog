<h2 class="title_h1"><?php echo $create_or_edit; ?> Page</h2>

<?php
echo validation_errors("<p style='color: red; '>", "</p>");

if ($page_title == "Trav Sample CMS Blog") {
	$page_title = "";
}

echo form_open(base_url()."webpages/submit/".$update_id); 
?>

<table>
	<tr>
		<td><p class="table_label">Page Headline:</p>
		<?php $data = array(
        'name'          => 'page_headline',
        'id'            => 'page_headline',
        'value'         => $page_headline,
        'maxlength'     => '230',
        'size'          => '50',
        // 'style'         => 'width:300px'
		);

		echo form_input($data); ?>

		</td>
		<td><p class="table_label">Page Title:</p>
		<?php $data = array(
        'name'          => 'page_title',
        'id'            => 'page_title',
        'value'         => $page_title,
        'maxlength'     => '230',
        'size'          => '50',
        // 'style'         => 'width:300px'
		);

		echo form_input($data); ?>

		</td>
	</tr>
	<tr>
		<td colspan="2"><p class="table_label">Keywords:</p>
		<?php $data = array(
        'name'          => 'keywords',
        'id'            => 'keywords',
        'value'         => $keywords,
        'maxlength'     => '230',
        'size'          => '50',
        // 'style'         => 'width:780px'
		);

		echo form_input($data); ?>
		</td>
	</tr>
	<tr>
		<td colspan="2"><p class="table_label">Page Description:</p>
		<?php $data = array(
        'name'          => 'description',
        'id'            => 'description',
        'value'         => $description,
        'maxlength'     => '230',
        'size'          => '50',
        // 'style'         => 'width:780px'
		);

		echo form_input($data); ?></td>
	</tr>
	<tr>
		<td colspan="2"><p class="table_label">Page Content:</p>
		<?php $data = array(
        'name'          => 'page_content',
        'id'            => 'page_content',
        'value'         => $page_content,
        'rows'          => '50',
        'cols'          => '50',
        // 'style'         => 'width:800px'
		);

		echo form_textarea($data); ?>
		<script src="/ckeditor/ckeditor.js"></script>
		<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'page_content' );
            </script>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<?php $data = array(
		        'name'          => 'submit',
		        'id'            => 'submit',
		        'value'   		=> 'Submit',
				); 
				echo form_submit($data);?>
		</td>
	</tr>
</table>

<?php echo form_close(); ?>

<script src="/assets/js/navbar.js"></script>
