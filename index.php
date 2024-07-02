<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subida de Imágenes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <h2>Subida de Imágenes</h2>
    <form id="uploadForm" enctype="multipart/form-data">
      <div class="form-group">
        <label for="images">Selecciona las imágenes (máximo 20):</label>
        <input type="file" class="form-control" id="images" name="images[]" multiple>
      </div>
      <div id="preview" class="mb-3"></div>
      <p>Archivos seleccionados: <span id="fileCount">0</span>/20</p>
      <button type="submit" class="btn btn-primary">Subir</button>
    </form>
    <div id="message" class="mt-3"></div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(function() {
      let filesList = [];

      function updatePreview() {
        $('#preview').empty();
        filesList.forEach((file, index) => {
          $('#preview').append(`
                        <div class="preview-item" data-index="${index}">
                            <span>${file.name}</span>
                            <button type="button" class="btn btn-danger btn-sm remove-file">Eliminar</button>
                        </div>
                    `);
        });
        $('#fileCount').text(filesList.length);
      }

      $('#images').on('change', function(e) {
        let newFiles = Array.from(e.target.files);

        // Eliminar archivos duplicados
        newFiles.forEach((file) => {
          if (!filesList.some(f => f.name === file.name)) {
            filesList.push(file);
          }
        });

        if (filesList.length > 20) {
          $('#message').html('<div class="alert alert-danger">No puedes subir más de 20 archivos.</div>');
          filesList = filesList.slice(0, 20);
        } else {
          $('#message').empty();
        }

        updatePreview();
      });

      $('#preview').on('click', '.remove-file', function() {
        let index = $(this).parent().data('index');
        filesList.splice(index, 1);
        updatePreview();
      });

      $('#uploadForm').on('submit', function(e) {
        e.preventDefault();

        if (filesList.length === 0) {
          $('#message').html('<div class="alert alert-danger">No has seleccionado ningún archivo.</div>');
          return;
        }

        let formData = new FormData();
        filesList.forEach((file, index) => {
          formData.append('images[]', file, file.name);
        });

        $.ajax({
          url: 'upload.php',
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function(response) {
            $('#message').html('<div class="alert alert-success">' + response + '</div>');
            filesList = [];
            updatePreview();
          },
          error: function() {
            $('#message').html('<div class="alert alert-danger">Ocurrió un error al subir los archivos.</div>');
          }
        });
      });
    });
  </script>
</body>

</html>