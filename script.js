$(document).ready(function () {
  $("#uploadForm").submit(function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
      url: "upload.php",
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
