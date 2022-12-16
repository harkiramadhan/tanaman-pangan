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

$("#shortData").change(function() {
    var filterValue = $(this).val();
    var row = $('.table-data'); 
    row.hide()
    row.each(function(i, el) {
    if($(el).attr('data-type') == filterValue) {
        $(el).show();
        }
    })
    if ("semua" == filterValue) {
      row.show();
    }
});
