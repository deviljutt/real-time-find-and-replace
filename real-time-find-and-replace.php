<?php
/*
Plugin Name: Real-Time Find and Replace
Version: 3.9
*/

//Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
* Add a submenu under Tools
*/
function far_add_pages() {
	 add_submenu_page( 'tools.php', 'Real-Time Find and Replace', 'Real-Time Find and Replace', 'activate_plugins', 'real-time-find-and-replace', 'far_options_page' );
}

function far_options_page() {
include( plugin_dir_path( __FILE__ ) . 'js/dynmicjs.php');

?>


<form method="post" action="<?php echo esc_url( $_SERVER["REQUEST_URI"] );?>">
<div class="container">
    <table id="myTable" class=" table order-list">
    <thead>
        <tr>
            <td>Search</td>
            <td>Replace</td>
			<td>Select Page</td>
        </tr>
    </thead>
    <tbody>
	<br><br>
			
			<?php 
			
			$far_settings = get_option( 'far_plugin_settings' ); 


	foreach ( $far_settings['setup-update'] as $key => $find ){
		
		echo "asdasd";
		
	}
	
	
	
					
				?>
	
	<br><br><br>
	
	
	
	
	
	
     
					<input type="hidden" name="setup-update" />
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: left;">
                <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row" />
				<input type="submit"/>
            </td>
        </tr>
        <tr>
        </tr>
		
    </tfoot>
	
</table>
</div>
</form>

<?php 

if ( isset( $_POST['setup-update'] ) ) {
		$_POST = stripslashes_deep( $_POST );
		update_option( 'far_plugin_settings', $_POST );		
}

var_dump(get_option( 'far_plugin_settings' ));











} ?>
<?php

//Add left menu item in admin
add_action( 'admin_menu', 'far_add_pages' );


