<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$title=mysqli_real_escape_string($conn,$_POST['title']);
$description=mysqli_real_escape_string($conn,$_POST['description']);
$duration=mysqli_real_escape_string($conn,$_POST['duration']);

if($sl_id==''){
	echo $sql1 = "insert into classes (title,description,duration) values('$title','$description','$duration')";
	$res=mysqli_query($conn,$sql1);
	$sl_id=mysqli_insert_id($conn);
}else{
	$sql1 = "update classes set title='$title',duration='$duration',description='$description' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if ($_FILES['image']['name']!='') {
			
	$tempFile = $_FILES['image']['tmp_name'];          //3             
	$targetPath = '../uploads/classes/'; 
	$ext = end((explode(".", $_FILES['image']['name'])));
	$file_name = 'classes'.date('ymdhis').'.'.$ext;
	$targetFile = $targetPath.$file_name;  //5
	move_uploaded_file($tempFile, $targetFile); //6
	$image = $file_name;
				
	$sql1 = "update classes set image='$image' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
// ========== CLASS A ==========
if ($_FILES['class_a_audio']['name'] != '') {
    $tempFile = $_FILES['class_a_audio']['tmp_name'];
    $targetPath = '../uploads/classes/class_audio/';
    $ext = pathinfo($_FILES['class_a_audio']['name'], PATHINFO_EXTENSION);
    $file_name = 'class_a_audio' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;
    move_uploaded_file($tempFile, $targetFile);
    $class_a_audio = $file_name;
    $sql1 = "UPDATE classes SET class_a_audio='$class_a_audio' WHERE sl_id='$sl_id'";
    $res = mysqli_query($conn, $sql1);
}

if ($_FILES['class_a_pdf']['name'] != '') {
    $tempFile = $_FILES['class_a_pdf']['tmp_name'];
    $targetPath = '../uploads/classes/class_pdf/';
    $ext = pathinfo($_FILES['class_a_pdf']['name'], PATHINFO_EXTENSION);
    $file_name = 'class_a_pdf' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;
    move_uploaded_file($tempFile, $targetFile);
    $class_a_pdf = $file_name;
    $sql1 = "UPDATE classes SET class_a_pdf='$class_a_pdf' WHERE sl_id='$sl_id'";
    $res = mysqli_query($conn, $sql1);
}

// ========== CLASS B ==========
if ($_FILES['class_b_audio']['name'] != '') {
    $tempFile = $_FILES['class_b_audio']['tmp_name'];
    $targetPath = '../uploads/classes/class_audio/';
    $ext = pathinfo($_FILES['class_b_audio']['name'], PATHINFO_EXTENSION);
    $file_name = 'class_b_audio' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;
    move_uploaded_file($tempFile, $targetFile);
    $class_b_audio = $file_name;
    $sql1 = "UPDATE classes SET class_b_audio='$class_b_audio' WHERE sl_id='$sl_id'";
    $res = mysqli_query($conn, $sql1);
}

if ($_FILES['class_b_pdf']['name'] != '') {
    $tempFile = $_FILES['class_b_pdf']['tmp_name'];
    $targetPath = '../uploads/classes/class_pdf/';
    $ext = pathinfo($_FILES['class_b_pdf']['name'], PATHINFO_EXTENSION);
    $file_name = 'class_b_pdf' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;
    move_uploaded_file($tempFile, $targetFile);
    $class_b_pdf = $file_name;
    $sql1 = "UPDATE classes SET class_b_pdf='$class_b_pdf' WHERE sl_id='$sl_id'";
    $res = mysqli_query($conn, $sql1);
}

// ========== CLASS C ==========
if ($_FILES['class_c_audio']['name'] != '') {
    $tempFile = $_FILES['class_c_audio']['tmp_name'];
    $targetPath = '../uploads/classes/class_audio/';
    $ext = pathinfo($_FILES['class_c_audio']['name'], PATHINFO_EXTENSION);
    $file_name = 'class_c_audio' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;
    move_uploaded_file($tempFile, $targetFile);
    $class_c_audio = $file_name;
    $sql1 = "UPDATE classes SET class_c_audio='$class_c_audio' WHERE sl_id='$sl_id'";
    $res = mysqli_query($conn, $sql1);
}

if ($_FILES['class_c_pdf']['name'] != '') {
    $tempFile = $_FILES['class_c_pdf']['tmp_name'];
    $targetPath = '../uploads/classes/class_pdf/';
    $ext = pathinfo($_FILES['class_c_pdf']['name'], PATHINFO_EXTENSION);
    $file_name = 'class_c_pdf' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;
    move_uploaded_file($tempFile, $targetFile);
    $class_c_pdf = $file_name;
    $sql1 = "UPDATE classes SET class_c_pdf='$class_c_pdf' WHERE sl_id='$sl_id'";
    $res = mysqli_query($conn, $sql1);
}

// ========== CLASS D ==========
if ($_FILES['class_d_audio']['name'] != '') {
    $tempFile = $_FILES['class_d_audio']['tmp_name'];
    $targetPath = '../uploads/classes/class_audio/';
    $ext = pathinfo($_FILES['class_d_audio']['name'], PATHINFO_EXTENSION);
    $file_name = 'class_d_audio' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;
    move_uploaded_file($tempFile, $targetFile);
    $class_d_audio = $file_name;
    $sql1 = "UPDATE classes SET class_d_audio='$class_d_audio' WHERE sl_id='$sl_id'";
    $res = mysqli_query($conn, $sql1);
}

if ($_FILES['class_d_pdf']['name'] != '') {
    $tempFile = $_FILES['class_d_pdf']['tmp_name'];
    $targetPath = '../uploads/classes/class_pdf/';
    $ext = pathinfo($_FILES['class_d_pdf']['name'], PATHINFO_EXTENSION);
    $file_name = 'class_d_pdf' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;
    move_uploaded_file($tempFile, $targetFile);
    $class_d_pdf = $file_name;
    $sql1 = "UPDATE classes SET class_d_pdf='$class_d_pdf' WHERE sl_id='$sl_id'";
    $res = mysqli_query($conn, $sql1);
}

if($res){
	header('location: classes.php?success');
}else{
	header('location: classes.php?error');
}
?>