<?php
if (isset($_POST)) {
    if (isset($_FILES['uploadedfile'])) {

        $fileTmpPath = $_FILES['uploadedfile']['tmp_name'];
        $fileName = $_FILES['uploadedfile']['name'];
        $fileSize = $_FILES['uploadedfile']['size'];
        $fileType = $_FILES['uploadedfile']['type'];
        
        $fileNameCmps = explode(".",$fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName=md5(time().$fileName).".".$fileExtension;

        $allowedExtensions=["sql","jpg","zip"];

        if (in_array($fileExtension, $allowedExtensions)) {

            $uploadFileDir = "./upload/";
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                echo "File uploaded successfully";
                header("refresh:5;upload_form.php");
            }else{
                echo "Error";
            }
        }else {
            echo "Extensión no permitida";
        }
    }
}
?>