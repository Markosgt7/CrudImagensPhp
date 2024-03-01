<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crud Fotos</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
  </head>
  <body>
    <div class="container mt-5">
      <h2>Subir Foto</h2>
      <form id="uploadForm" enctype="multipart/form-data" method="post">
        <div class="form-group">
          <input
            type="file"
            class="form-control-file"
            id="photo"
            name="photo"
            accept="image/*"
            capture="camera"
            required
          />
        </div>
        <button type="submit" class="btn btn-primary">Subir Foto</button>
      </form>
      <hr>
      <table class="table table-bordered  table-striped">
      <thead>
        <tr>
          <th scope="col">Ruta  de la foto</th>
          <th scope="col">Foto</th>
        </tr>
        </thead>
        <tbody>
          <tr>
            <td>uploads/foto</td>
            <td><img src="" alt="Imagen no cargada" id="fotoPrevisualizacion" /></td>
          </tr>
        </tbody>
    </table>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="script.js"></script>
    <!-- <script src="codigo.js"></script> -->
  </body>
</html>
