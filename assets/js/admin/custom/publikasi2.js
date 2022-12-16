$('.btn-remove').click(function(){
    var id = $(this).attr('data-id')
    $.ajax({
        url: baseUrl + 'admin/publikasi/remove/' + id,
        type: 'get',
        beforeSend: function(){
            $('.remove-content').empty()
            $('#modalRemove').modal('show')
        },
        success: function(res){
            $('.remove-content').html(res)
        }
    })
})

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
