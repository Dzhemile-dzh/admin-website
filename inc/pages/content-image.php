  <?  
if ($_GET['img'] == 1 || $_POST['submit_img'] && !isset($_POST["submit_article"])){

      //UPLOADIING IMAGE
        if(isset($_POST["submit_img"])) {

        //SET PATH FOR IMG FOLDER
        $target_dir = "../../../<? $wc_website_content->wc_image?>/img/content/";
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
  }
?>
<!DOCTYPE html>
<html>
<body>
<form method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="wc_image"class="btn btn-outline-primary" id="wc_image">
    <input type="submit" name="submit_article" class="btn btn-outline-primary"value="POST IMAGE">
    </form>
<script type="text/javascript">
  function showImage(value)
  {
     var img = "<img src='../img/content/"+value+".jpg' />";
     document.getElementById('image_div').innerHTML = img;
     var dropdown = $("#wc_image");
     var selectedText = dropdown.find("option:selected").text();
     init = selectedText.indexOf('(');
     fin = selectedText.indexOf(')');
     pri=selectedText.substr(init+1,fin-init-1);
     document.getElementById("wc_image2").value = pri;
  }
</script>
