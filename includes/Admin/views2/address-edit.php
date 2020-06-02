<div>
	<h1  class="wp-heading-inline">
	Address Edit
</h1>



    <form action="" method="post">
        <?php
$table = new WeDevs\Academy\Admin\Address_List2();
$table->prepare_items();
$table->search_box('search', 'search_id');
$table->display();
?>
    </form>
</div>
