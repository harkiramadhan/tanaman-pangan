var page = $('#page').val()

$('.filter, #select-status').change(function(){
    var status = $('#select-status').find(':selected').val()
    var ids = [];
    $('input[name="ids[]"]:checked').each(function() {
        ids.push('&ids['+ this.value +']=' + this.value); 
    });
    var filterid = ids.join('')
    var url = baseUrl + 'tanitrainer?page=' + page + filterid + '&status=' + status
    window.location.replace(url)
})