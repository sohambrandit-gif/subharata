<?php include "../global/connection.php"; ?>
<?php
if ($_FILES['file']['name']) {
    if (!$_FILES['file']['error']) {
          $name = date('YmdHis');
          $ext = explode('.', $_FILES['file']['name']);
          $filename = $name . '.jpg';
          $destination = '../uploads/blog/' . $filename; //change this directory
          $location = $_FILES["file"]["tmp_name"];
		   move_uploaded_file($location, $destination);
                echo '../uploads/blog/' . $filename;//change this URL
           }
           else
           {
            	echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
      	   }
}
?>