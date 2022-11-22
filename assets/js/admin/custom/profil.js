var toolbarOptions = [['bold', 'italic', 'underline', 'strike'], ['link'],  [{ 'list': 'ordered'}, { 'list': 'bullet' }]];
var options = {
    debug: 'info',
    modules: {
        toolbar: toolbarOptions
    },
    placeholder: 'Tulis deskripsi...',
    theme: 'snow'
};
var editor = new Quill('#editor', options);
editor.pasteHTML($('#deskripsi').val());
editor.on('text-change', function(delta, oldDelta, source) {
    console.log(editor.container.firstChild.innerHTML)
    $('#deskripsi').val(editor.container.firstChild.innerHTML)
});
$('select').select2()


$('#select-prov').change(function(){
    var provid = $(this).find(':selected').val()
    $.ajax({
        url: baseUrl + 'admin/jejaring/getKabupaten',
        type: 'get',
        data: { provid : provid},
        beforeSend: function(){
            $('#select-kab').empty()
            $('#select-kec').empty().append('<option value=""> Pilih Kecamatan</option>')
            $('#select-kel').empty().append('<option value=""> Pilih Desa/Kelurahan</option>')

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
        url: baseUrl + 'admin/jejaring/getKecamatan',
        type: 'get',
        data: { kabid : kabid},
        beforeSend: function(){
            $('#select-kec').prop('disabled', false)
            $('#select-kel').prop('disabled', true)
            $('#select-kel').empty().append('<option value=""> Pilih Desa/Kelurahan</option>')
        },
        success: function(res){
            $('#select-kec').html(res)
        }
    })
})

$('#select-kec').change(function(){
    var kecid = $(this).find(':selected').val()
    $.ajax({
        url: baseUrl + 'admin/jejaring/getKelurahan',
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

function previewImage() {
    var element = document.getElementById("image-preview")
    element.classList.remove("d-none")
    document.getElementById("image-preview").style.display = "block"

    var oFReader = new FileReader()
    oFReader.readAsDataURL(document.getElementById("image-source").files[0])
    oFReader.onload = function(oFREvent) {
    document.getElementById("image-preview").src = oFREvent.target.result
  }
}

function previewImage2() {
    var element = document.getElementById("image-preview2")
    element.classList.remove("d-none")
    document.getElementById("image-preview2").style.display = "block"

    var oFReader = new FileReader()
    oFReader.readAsDataURL(document.getElementById("image-source2").files[0])
    oFReader.onload = function(oFREvent) {
    document.getElementById("image-preview2").src = oFREvent.target.result
  }
}