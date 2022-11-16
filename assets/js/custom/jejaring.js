$(document).ready(function(){
    getMoreData(0)
})

function getMoreData(lastId){
    $.ajax({
        url: baseUrl + 'jejaring/ajaxGetJejaring/' + lastId,
        type: 'get',
        success: function(res){
            $('.data-acara').append(res)
        }
    })
}