<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form enctype="multipart/form-data" method="post" action="files.php">
        Your Name: <input type="text" name="username"><br>
        Upload image here: <input type="file" name="image"><br>
        <input type="submit" name="submit" value="submit">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];

        if (isset($_FILES['image'])) {
            // print_r($_FILES);

            $file_name = $_FILES['image']['name'];
            $file_tmpname = $_FILES['image']['tmp_name'];
            $file_type = $FILES['image']['type'];
            $file_size = $FILES['image']['size'];

            $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
            $typeof_files = ['png', 'jpeg', 'jpg', 'gif'];
            // echo "$file_ext";
            $new_name = $username.".".$file_ext;

            //$new_namess = base64_encode(file_get_contents($file_name));

            echo $new_namess;
            
            $target_path = "";
            $target_path = $target_path . basename($new_name);

            if (!file_exists($new_name)) {
                
                if (!(in_array($file_ext, $typeof_files))) {
                    $message = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
                    echo '<script type="text/javascript">alert("' . $message . '");</script>';
                }elseif($file_size >= 500000 ){
                    $message = 'Size must be less than 500KB.';
                    echo '<script type="text/javascript">alert("' . $message . '");</script>';
                } elseif(move_uploaded_file($file_tmpname, $target_path)) {
                    echo "File Uploaded Successfully";
                } else {
                    echo "File Not Uploaded";
                }
                
            } else {
                echo " File Already Exists.";
            }
        }
    }
    ?>
</body>

</html>