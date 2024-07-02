<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Crud Fotos</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>

<body>
  <div class="container mt-5">
    <h2>Subir Foto</h2>
    <form id="uploadForm" enctype="multipart/form-data" method="post">
      <div class="form-group">
        <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*" capture="camera" required />
      </div>
      <button type="submit" class="btn btn-primary">Subir Foto</button>

    </form>
    <hr>
    <table class="table table-bordered  table-striped">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Foto</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody id="table_fotos">

      </tbody>
    </table>
  </div>
  <!-- Agrega un modal para mostrar la imagen -->
  <div class="modal" id="imageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <img id="modalImage" src="" class="img-fluid">
        </div>
      </div>
    </div>
  </div>

  <!-- Agrega iconos de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- <script src="script.js"></script> -->
  <script src="script.min.js"></script>
  <!-- <script src="codigo.js"></script> -->

</body>

</html>