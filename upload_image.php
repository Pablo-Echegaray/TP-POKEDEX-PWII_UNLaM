<?php

// Verificar si se ha enviado un archivo
if (isset($_FILES['archivo']) && $_FILES['archivo']['size'] > 0){
    $file_name = $_FILES['archivo']['name'];
    $file_size = $_FILES['archivo']['size'];
    $file_tmp = $_FILES['archivo']['tmp_name'];
    $file_type = $_FILES['archivo']['type'];
    /*
    echo $file_name;
    echo $file_size;
    echo $file_tmp;
    echo $file_type;
    */

    // Carpeta donde se moverá el archivo
    $upload_folder = '../static/img';

    // Mover el archivo a la carpeta especificada
    if (file_exists($upload_folder. "/" .$file_name)){
        echo $_FILES['archivo']['name'] . " ya existe";
    }
    else{
        move_uploaded_file($file_tmp,$upload_folder."/".$file_name);
        echo "El archivo " . $file_name ." se subio correctamente";

        // Redirigir automáticamente a la página de carga
        header("Location: instagramo.php");
        exit(); // Asegura que el script se detenga después de la redirección
    }
}
else{
    echo "Por favor seleccione un archivo";
}
?>