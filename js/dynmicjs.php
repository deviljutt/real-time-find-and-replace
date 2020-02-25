<?php $args = array(
    'sort_column' => 'post_title',
    'post_type' => 'page',
    'post_status' => 'publish'
); 
$pages = get_pages($args); 
?>	
<script>
jQuery(document).ready(function($) {
    var counter = 0;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><textarea  class="form-control" name="search' + counter + '"/></textarea></td>';
        cols += '<td><textarea  class="form-control" name="replace' + counter + '"/></textarea></td>';
        cols += '<td><select name="page"><?php foreach ($pages as $page) {$title = $page->post_title;$id = $page->ID; echo '<option value='.$id.'>'.$title. "</option>";} ?>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
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