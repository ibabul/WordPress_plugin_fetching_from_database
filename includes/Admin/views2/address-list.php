<div class="wrap">

<h1 class="wp-heading-inline"><?php _e( 'Address Book', 'wedevs-academy' ); ?></h1>


<a class ='page-title-action' href="<?php echo admin_url( 'admin.php? page=wedevs-academy&action=new' ); ?>"><?php _e( 'Add new', 'wedevs-academy' ); ?></a>



<form action="" method="post">
<?php

	$table = new WeDevs\Academy\Admin\Address_List2();
	$table->prepare_items();
	$table->display();

?>
</form>
</div>

