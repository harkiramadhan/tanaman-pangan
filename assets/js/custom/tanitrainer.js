var page = $('#page').val()

$('.filter').change(function(){
    var ids = [];
    $('input[name="ids[]"]:checked').each(function() {
        ids.push('&ids['+ this.value +']=' + this.value); 
    });
    var filterid = ids.join('')
    var url = baseUrl + 'tanitrainer?page=' + page + filterid
    window.location.replace(url)
})
