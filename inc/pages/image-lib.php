<?
    if(isset($_POST["submit"])) {
        //SET PATH FOR IMG FOLDER
        $target_dir = "../../../<?wc_website_content->wc_image?>/img/content/";
        $target_file = $target_dir . basename($_FILES["wc_image"]["name"]);
        $ImageName = $_FILES["wc_image"]["name"];
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["wc_image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // Check if file already exists
        if (file_exists($target_file) && $uploadOk == 1) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["wc_image"]["size"] > 500000 && $uploadOk == 1) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $uploadOk == 1) {
            echo "Sorry, only JPGs, are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["wc_image"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["wc_image"]["name"]). " has been uploaded.";
                $ImageName = str_replace('.jpg','', $ImageName); 
                DB::query("INSERT INTO im_images (im_filename) VALUES ('".$ImageName."')");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<body>
<form method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="wc_image" id="wc_image">
    <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>