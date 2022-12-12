var page = $('#page').val()

$('.custom-control-input').click(function(){
    loadData()
})

$('#order').change(function(){
    loadData()
})

function loadData(){
    var order = $('#order').find(':selected').val()
    var data = $('input[type="checkbox"]').filter(':checked').toArray()
               .reduce(function(acc, val) {        
                  acc.push('ids[' + val.value  + ']=' + val.value);
                  return acc;
               }, []).join('&')
    var url = baseUrl + 'publikasi?' + data + '&page=' + page + '&order=' + order
    window.location.replace(url)
}