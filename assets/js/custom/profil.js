$('#select-prov').change(function(){
    var provid = $(this).find(':selected').val()
    $.ajax({
        url: baseUrl + 'user/getKabupaten',
        type: 'get',
        data: { provid : provid},
        beforeSend: function(){
            $('#select-kab').empty()
            $('#select-kec').empty().append('<option> Pilih Kecamatan</option>')
            $('#select-kel').empty().append('<option> Pilih Desa/Kelurahan</option>')

            $('#select-kec').prop('disabled', true)
            $('#select-kel').prop('disabled', true)
        },
        success: function(res){
            $('#select-kab').prop('disabled', false)
            $('#select-kab').html(res)
        }
    })
})

$('#select-kab').change(function(){
    var kabid = $(this).find(':selected').val()
    $.ajax({
        url: baseUrl + 'user/getKecamatan',
        type: 'get',
        data: { kabid : kabid},
        beforeSend: function(){
            $('#select-kec').prop('disabled', false)
            $('#select-kel').prop('disabled', true)
            $('#select-kel').empty().append('<option> Pilih Desa/Kelurahan</option>')
        },
        success: function(res){
            $('#select-kec').html(res)
        }
    })
})

$('#select-kec').change(function(){
    var kecid = $(this).find(':selected').val()
    $.ajax({
        url: baseUrl + 'user/getKelurahan',
        type: 'get',
        data: { kecid : kecid},
        beforeSend: function(){
            $('#select-kel').empty()
            $('#select-kel').prop('disabled', false)
        },
        success: function(res){
            $('#select-kel').html(res)
        }
    })
})