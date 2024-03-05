<?php
require_once 'vendor/autoload.php';
use Verot\Upload\Upload;
include './config/conexion.php';

switch ($_GET['op']) {
  case 'enviarfoto':
    function redirect($url){
      header(sprintf('Location: %s', $url));
      die;
    }
    if (!isset($_FILES['photo'])){
        redirect("index.php?error=No-image");
    }
    $file = $_FILES['photo'];
    $path = 'uploads/';
    $foo = new Upload($file);
    if(!$foo){
        redirect("index.php?error=no-uploaded");
    }
    $user = 'jcastillo';
    $filename = uniqid() . '_' . $user . '_' . $_FILES['photo']['name'];
    $size_x = 1000;
    $foo->file_new_name_body = $filename;
    $foo->file_new_name_ext = '';
    $foo->image_resize = true;
    $foo->image_ratio_y = true; // Mantener la relación de aspecto y ajustar la altura automáticamente
    $foo->image_x = $size_x;
    $foo->jpeg_quality = 90; // Establecer la calidad JPEG
    $foo->process($path);
    $uploadDir = $path . $filename;
    if($foo->processed){
      
      $stmt = $pdo->prepare("INSERT INTO imagenes (ruta) VALUES (:ruta)");
      $stmt->bindParam(':ruta', $uploadDir);
      $stmt->execute();
      echo sprintf('Imagen redimensionada a %s px con éxito <br>', $size_x);
    }else{
      echo sprintf('Error: %s<br>', $foo->error);
    }
  break;
  case 'mostrarfotos':
    $sql =  $pdo->prepare("SELECT * FROM imagenes");
    $sql -> execute();
    $listaImagenes = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($listaImagenes as $imagen ) {
      echo '<tr>
              <td>'
                .$imagen["id"].
              '</td>
              <td>
                <img src="'.$imagen["ruta"].'" width="150" height="175"/>
              </td>
            </tr>';
    }
  break;
  
  default:
    # code...
    break;
}

