<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validExtensions = array("jpg", "jpeg", "png"); 
    $maxFileSize = 1 * 1024 * 1024;
    $fileName = $_FILES["file"]["name"];
    $fileSize = $_FILES["file"]["size"];
    $fileTmp = $_FILES["file"]["tmp_name"];
    $fileType = $_FILES["file"]["type"];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($fileExt, $validExtensions)) {
        echo "Invalid file extension. Only JPG, JPEG, and PNG files are allowed.";
        exit;
    }

    if ($fileSize > $maxFileSize) {
        echo "File size exceeds the limit of 1 MB.";
        exit;
    }

    $newname = $_POST['name'] . "." . $fileExt;

    $encodeMethod = "hex"; // or "hex"

    $changeFileName = true;

    if ($changeFileName) {
        move_uploaded_file($fileTmp, "/home/mann_shah/Desktop/file uploaded/".$newname);

    } else {
        move_uploaded_file($fileTmp, "/home/mann_shah/Desktop/file uploaded/".$fileName);
    }

    $encodedFile = "";
    if ($encodeMethod == "base64") {
        $encodedFile = base64_encode(file_get_contents("/home/mann_shah/Desktop/file uploaded/".$newname));
    } elseif ($encodeMethod == "hex") {
        $encodedFile = bin2hex(file_get_contents("/home/mann_shah/Desktop/file uploaded/".$newname));
    }


    // $file = $_POST['name'] . ".txt";
    // $handle = fopen($file, 'x+');
    // if ($handle = fopen($file, 'w')){
    // fwrite($handle, $encodedFile);
    // fclose($handle);
    // }
    // echo "Encoded file contents: ".$encodedFile;
}
?>

<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="text" name = "name" >
    <input type="file" name="file" />
    <input type="submit" value="Upload" />
    <?php
    include "/upload/encoded_text/encode.php";
    encode();

    ?>
   
</form>
