$(document).ready(function () {
  mostrarImagenes();

  $("#uploadForm").submit(function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
      url: "upload.php?op=enviarfoto",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        alert(response);
        $("#photo").val(""); // Limpia el campo de selección de foto
      },
      error: function (response) {
        alert(response);
      },
    });
  });
});

function mostrarImagenes() {
  $.ajax({
    url: "upload.php?op=mostrarfotos",
    type: "get",
    success: function (response) {
      console.log(response);
      $("#table_fotos").html(response); // Limpia el campo de selección de foto
    },
    error: function (response) {
      alert(response);
    },
  });
}
