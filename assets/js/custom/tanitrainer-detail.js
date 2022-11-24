$('.btn-register').click(function(){
    var url = $(this).attr('data-url')
    var userid = $(this).attr('data-userid')
    var tanitrainerid = $(this).attr('data-trainerid')

    if(url){
        window.location.replace(url)
    }else{
        $.ajax({
            url: baseUrl + 'tanitrainer/join',
            type: 'post',
            data: {
                userid : userid,
                tanitrainerid : tanitrainerid
            },
            success: function(){
                location.reload()
            }
        })
    }
})