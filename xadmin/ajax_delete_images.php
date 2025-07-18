<?php include "global/connection.php"; ?>
<?php 
$targetPath = '../uploads/portfolio/'.$_POST['cat_id']."/";
echo $targetPath.$_POST['file_name'];
unlink($targetPath.$_POST['file_name']);	
unlink($targetPath.str_replace(".","-big.",$_POST['file_name']));		
?>
