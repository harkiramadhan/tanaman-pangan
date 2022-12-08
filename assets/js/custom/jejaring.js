var komoditasid = $('#select-komoditas').find(':selected').val()
var page = $('#page').val()

$('#select-komoditas, #select-prov, #select-role, #select-type').change(function(){
    var type = $('#select-type').find(':selected').val()
    var roleid = $('#select-role').find(':selected').val()
    var provid = $('#select-prov').find(':selected').val()
    var komoditasid = $(this).find(':selected').val()
    var url = baseUrl + 'jejaring?page=' + page + '&komoditasid=' + komoditasid + '&provid=' + provid + '&roleid=' + roleid + '&type=' + type
    window.location.replace(url)
})