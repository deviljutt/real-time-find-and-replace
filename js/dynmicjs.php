<?php $args = array(
    'sort_column' => 'post_title',
    'post_type' => 'page',
    'post_status' => 'publish'
); 
$pages = get_pages($args); 
?>	
<script>
jQuery(document).ready(function($) {
    var counter = jQuery('#id').val();

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";
		var inc=0;
		var inc = inc+1;
		
		
		
		
        cols += '<td><textarea  class="form-control" name="search[' + counter + ']"/></textarea></td>';
        cols += '<td><textarea  class="form-control" name="replace[' + counter + ']"/></textarea></td>';
        cols += '<td><select name="page[' + counter + ']"><option value="allpage">All Page</option><?php foreach ($pages as $page) {$title = $page->post_title;$id = $page->ID; echo '<option value='.$id.'>'.$title. "</option>";} ?>';
		cols += '<input type="hidden" name="row' + counter + '">';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
		counter = (counter - 1) + 2;
		document.getElementById("id").value = counter;
    });
    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
</script>