<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$sample_audio_a1_title=mysqli_real_escape_string($conn,$_POST['sample_audio_a1_title']);
$sample_audio_a2_title=mysqli_real_escape_string($conn,$_POST['sample_audio_a2_title']);
$sample_audio_b1_title=mysqli_real_escape_string($conn,$_POST['sample_audio_b1_title']);
$sample_audio_b2_title=mysqli_real_escape_string($conn,$_POST['sample_audio_b2_title']);
$sample_audio_c1_title=mysqli_real_escape_string($conn,$_POST['sample_audio_c1_title']);
$sample_audio_c2_title=mysqli_real_escape_string($conn,$_POST['sample_audio_c2_title']);
$sample_audio_d1_title=mysqli_real_escape_string($conn,$_POST['sample_audio_d1_title']);
$sample_audio_d2_title=mysqli_real_escape_string($conn,$_POST['sample_audio_d2_title']);
$sample_audio_d3_title=mysqli_real_escape_string($conn,$_POST['sample_audio_d3_title']);
$sample_audio_d4_title=mysqli_real_escape_string($conn,$_POST['sample_audio_d4_title']);


	echo $sql1 = "update sample_audios set sample_audio_a1_title='$sample_audio_a1_title', sample_audio_a2_title='$sample_audio_a2_title', sample_audio_b1_title='$sample_audio_b1_title', sample_audio_b2_title='$sample_audio_b2_title', sample_audio_c1_title='$sample_audio_c1_title', sample_audio_c2_title='$sample_audio_c2_title', sample_audio_d1_title='$sample_audio_d1_title', sample_audio_d2_title='$sample_audio_d2_title', sample_audio_d3_title='$sample_audio_d3_title', sample_audio_d4_title='$sample_audio_d4_title' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);



if ($_FILES['sample_audio_a1']['name'] != '') {
    $tempFile = $_FILES['sample_audio_a1']['tmp_name'];
    $targetPath = '../uploads/sample_audios/';
    $ext = pathinfo($_FILES['sample_audio_a1']['name'], PATHINFO_EXTENSION);
    $file_name = 'sample_audio_a1' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;
    move_uploaded_file($tempFile, $targetFile);
    $sample_audio_a1 = $file_name;
    $sql1 = "UPDATE sample_audios SET sample_audio_a1='$sample_audio_a1' WHERE sl_id='$sl_id'";
    $res = mysqli_query($conn, $sql1);
}

if ($_FILES['sample_audio_a2']['name'] != '') {
    $tempFile = $_FILES['sample_audio_a2']['tmp_name'];
    $targetPath = '../uploads/sample_audios/';
    $ext = pathinfo($_FILES['sample_audio_a2']['name'], PATHINFO_EXTENSION);
    $file_name = 'sample_audio_a2' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;
    move_uploaded_file($tempFile, $targetFile);
    $sample_audio_a2 = $file_name;
    $sql1 = "UPDATE sample_audios SET sample_audio_a2='$sample_audio_a2' WHERE sl_id='$sl_id'";
    $res = mysqli_query($conn, $sql1);
}

if ($_FILES['sample_audio_b1']['name'] != '') {
    $tempFile = $_FILES['sample_audio_b1']['tmp_name'];
    $targetPath = '../uploads/sample_audios/';
    $ext = pathinfo($_FILES['sample_audio_b1']['name'], PATHINFO_EXTENSION);
    $file_name = 'sample_audio_b1' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;
    move_uploaded_file($tempFile, $targetFile);
    $sample_audio_b1 = $file_name;
    $sql1 = "UPDATE sample_audios SET sample_audio_b1='$sample_audio_b1' WHERE sl_id='$sl_id'";
    $res = mysqli_query($conn, $sql1);
}

if ($_FILES['sample_audio_b2']['name'] != '') {
    $tempFile = $_FILES['sample_audio_b2']['tmp_name'];
    $targetPath = '../uploads/sample_audios/';
    $ext = pathinfo($_FILES['sample_audio_b2']['name'], PATHINFO_EXTENSION);
    $file_name = 'sample_audio_b2' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;
    move_uploaded_file($tempFile, $targetFile);
    $sample_audio_b2 = $file_name;
    $sql1 = "UPDATE sample_audios SET sample_audio_b2='$sample_audio_b2' WHERE sl_id='$sl_id'";
    $res = mysqli_query($conn, $sql1);
}

if ($_FILES['sample_audio_c1']['name'] != '') {
    $tempFile = $_FILES['sample_audio_c1']['tmp_name'];
    $targetPath = '../uploads/sample_audios/';
    $ext = pathinfo($_FILES['sample_audio_c1']['name'], PATHINFO_EXTENSION);
    $file_name = 'sample_audio_c1' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;
    move_uploaded_file($tempFile, $targetFile);
    $sample_audio_c1 = $file_name;
    $sql1 = "UPDATE sample_audios SET sample_audio_c1='$sample_audio_c1' WHERE sl_id='$sl_id'";
    $res = mysqli_query($conn, $sql1);
}

if ($_FILES['sample_audio_c2']['name'] != '') {
    $tempFile = $_FILES['sample_audio_c2']['tmp_name'];
    $targetPath = '../uploads/sample_audios/';
    $ext = pathinfo($_FILES['sample_audio_c2']['name'], PATHINFO_EXTENSION);
    $file_name = 'sample_audio_c2' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;
    move_uploaded_file($tempFile, $targetFile);
    $sample_audio_c2 = $file_name;
    $sql1 = "UPDATE sample_audios SET sample_audio_c2='$sample_audio_c2' WHERE sl_id='$sl_id'";
    $res = mysqli_query($conn, $sql1);
}

if ($_FILES['sample_audio_d1']['name'] != '') {
    $tempFile = $_FILES['sample_audio_d1']['tmp_name'];
    $targetPath = '../uploads/sample_audios/';
    $ext = pathinfo($_FILES['sample_audio_d1']['name'], PATHINFO_EXTENSION);
    $file_name = 'sample_audio_d1' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;
    move_uploaded_file($tempFile, $targetFile);
    $sample_audio_d1 = $file_name;
    $sql1 = "UPDATE sample_audios SET sample_audio_d1='$sample_audio_d1' WHERE sl_id='$sl_id'";
    $res = mysqli_query($conn, $sql1);
}
if ($_FILES['sample_audio_d2']['name'] != '') {
    $tempFile = $_FILES['sample_audio_d2']['tmp_name'];
    $targetPath = '../uploads/sample_audios/';
    $ext = pathinfo($_FILES['sample_audio_d2']['name'], PATHINFO_EXTENSION);
    $file_name = 'sample_audio_d2' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;
    move_uploaded_file($tempFile, $targetFile);
    $sample_audio_d2 = $file_name;
    $sql1 = "UPDATE sample_audios SET sample_audio_d2='$sample_audio_d2' WHERE sl_id='$sl_id'";
    $res = mysqli_query($conn, $sql1);
}
if ($_FILES['sample_audio_d3']['name'] != '') {
    $tempFile = $_FILES['sample_audio_d3']['tmp_name'];
    $targetPath = '../uploads/sample_audios/';
    $ext = pathinfo($_FILES['sample_audio_d3']['name'], PATHINFO_EXTENSION);
    $file_name = 'sample_audio_d3' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;
    move_uploaded_file($tempFile, $targetFile);
    $sample_audio_d3 = $file_name;
    $sql1 = "UPDATE sample_audios SET sample_audio_d3='$sample_audio_d3' WHERE sl_id='$sl_id'";
    $res = mysqli_query($conn, $sql1);
}
if ($_FILES['sample_audio_d4']['name'] != '') {
    $tempFile = $_FILES['sample_audio_d4']['tmp_name'];
    $targetPath = '../uploads/sample_audios/';
    $ext = pathinfo($_FILES['sample_audio_d4']['name'], PATHINFO_EXTENSION);
    $file_name = 'sample_audio_d4' . date('ymdhis') . '.' . $ext;
    $targetFile = $targetPath . $file_name;
    move_uploaded_file($tempFile, $targetFile);
    $sample_audio_d4 = $file_name;
    $sql1 = "UPDATE sample_audios SET sample_audio_d4='$sample_audio_d4' WHERE sl_id='$sl_id'";
    $res = mysqli_query($conn, $sql1);
}

// if($res){
// 	header('location: sample_audios.php?success');
// }else{
// 	header('location: sample_audios.php?error');
// }
// ?>