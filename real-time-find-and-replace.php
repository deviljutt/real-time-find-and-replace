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
			$i = 0;
			$far_settings = get_option( 'far_plugin_settings' ); 

			
			
	foreach ( $far_settings["search"] as $key => $find ){
		
		echo "</br></br>";
		print_r($far_settings);
		echo "</br></br>";

echo "<div class='findif' id='id'>44</div>";

		$searchfield = $far_settings["search"][$i];
		$replacefield = $far_settings["replace"][$i];
		$selectpage = $far_settings["page"][$i];
		var_dump($selectpage);		

				
		$cols = '<tr ><td><textarea  class="form-control" name="search" />'.$searchfield.'</textarea></td>';
        $cols.= '<td><textarea  class="form-control" name="replace"/>'.$replacefield.'</textarea></td>';			
	   $cols.= '

	   <td>
	   
	   <select name="page'.$i.'">
	   
	   <option value="1">All Page</option>
	   <option value="2">1</option>
	   <option value="3">2</option>
	   
	   </select>';
		
		$cols .= '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';

		
			echo $cols	;
				
				
				
				
				
				
		$i = $i + 1;
		echo "</tr>";
			}
	
				?>
	
	<br><br><br>

    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: left;">
				<input type="hidden" name="row">

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

if ( isset( $_POST['row'] ) ) {
		update_option( 'far_plugin_settings', $_POST );		
}

//var_dump(get_option( 'far_plugin_settings' ));











} ?>
<?php

//Add left menu item in admin
add_action( 'admin_menu', 'far_add_pages' );


