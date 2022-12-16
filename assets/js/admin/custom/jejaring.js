$("#shortData").change(function() {
    var filterValue = $(this).val();
    var row = $('.table-data'); 
    row.hide()
    row.each(function(i, el) {
    if($(el).attr('data-type') == filterValue) {
        $(el).show();
        }
    })
    if ("semua" == filterValue) {
      row.show();
    }
});
