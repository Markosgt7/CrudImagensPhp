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
        mostrarImagenes(); // Vuelve a cargar las imágenes después de subir una nueva
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
      $("#table_fotos").html(response); // Inserta las imágenes en la tabla
    },
    error: function (response) {
      alert(response);
    },
  });
}

// Agrega un evento clic a los iconos de visualización de imágenes
$(document).on("click", ".view-image", function () {
  var imageUrl = $(this).data("image-url"); // Obtiene la URL de la imagen
  $("#modalImage").attr("src", imageUrl); // Establece la URL de la imagen en el modal
  $("#imageModal").modal("show"); // Muestra el modal
});
