$('.btn-edit').click(function(){
    var id = $(this).attr('data-id')
    $.ajax({
        url: baseUrl + 'admin/partner/edit/' + id,
        type: 'get',
        beforeSend: function(){
            $('.edit-content').empty()
            $('#modalEdit').modal('show')
        },
        success: function(res){
            $('.edit-content').html(res)
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