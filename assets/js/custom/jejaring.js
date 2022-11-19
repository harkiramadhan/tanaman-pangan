var komoditasid = $('#select-komoditas').find(':selected').val()
var page = $('#page').val()

$('#select-komoditas, #select-prov, #select-role').change(function(){
    var roleid = $('#select-role').find(':selected').val()
    var provid = $('#select-prov').find(':selected').val()
    var komoditasid = $(this).find(':selected').val()
    var url = baseUrl + 'jejaring?page=' + page + '&komoditasid=' + komoditasid + '&provid=' + provid + '&roleid=' + roleid
    window.location.replace(url)
})