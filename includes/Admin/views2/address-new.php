<div class='wrap'>
	<h1><?php _e('New page', 'wevdevs-academy');?></h1>

	<pre style="color:red;font-family: monospace;"><?php print_r($this->errors);?></pre>

	<form  action="" method="post">
		<table class='form-table'>
			<tr>
				<th scope="row">
					<label for="name">
						<?php _e('Name', 'wevdevs-academy');?>
					</label>
				</th>
				<td>
					<input type="text" name="name" id="name" value="" class="regular-text">
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label for="address">
						<?php _e('Address', 'wevdevs-academy');?>
					</label>
				</th>
				<td>
					<textarea type="text" name="address" id="address" value="" class="regular-text"></textarea>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label for="phone">
						<?php _e('Phone', 'wevdevs-academy');?>
					</label>
				</th>
				<td>
					<input type="number" name="phone" id="phone" value="" class="regular-text">
				</td>
			</tr>
		</table>

   		<?php wp_nonce_field('new-address2');?>
		<?php submit_button(__('Add address', 'wevdevs-academy'), 'primary', 'submit_address2');?>

	</form>
</div>