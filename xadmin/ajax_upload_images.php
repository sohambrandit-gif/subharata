<?php include "global/connection.php"; ?>
<?php 
$targetPath = '../uploads/portfolio/'.$_POST['cat_id'];


if (!file_exists($targetPath)) {
	mkdir($targetPath, 0777, true);
}
	//print_r($_FILES);
	if($_POST['cat_id']!=''){
		$cat_id = $_POST['cat_id'];
	

    $errors=0;
	$targetPath = '../uploads/portfolio/'.$cat_id."/";  
    $image =$_FILES["file"]["name"];
    $uploadedfile = $_FILES['file']['tmp_name'];


        
        $ext = end((explode(".", $_FILES['file']['name'])));
         $file_data = (explode(".", $_FILES['file']['name']));
	    $filename = str_replace(' ','',trim($file_data[0])).'.'.$file_data[1];
	      $filename1 = str_replace(' ','',trim($file_data[0])).'-big.'.$file_data[1];



$imagick = new Imagick($uploadedfile);

// Set the new dimensions
$newWidth = 800;
$newHeight = 1000;

// Resize the image
$imagick->resizeImage($newWidth, $newHeight, Imagick::FILTER_LANCZOS, 1, true); // Example filter and blur
// Optionally, write the resized image to a new file
$imagick->writeImage($targetPath.$filename);


$imagick = new Imagick($uploadedfile);

// Set the new dimensions
$newWidth = 1200;
$newHeight = 1500;

// Resize the image
$imagick->resizeImage($newWidth, $newHeight, Imagick::FILTER_LANCZOS, 1, true); // Example filter and blur
// Optionally, write the resized image to a new file
$imagick->writeImage($targetPath.$filename1);


	echo $filename;
	}	
	
?>
