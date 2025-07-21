<?php 
include "global/function.php";

// Check if user is logged in
if(!isset($_SESSION['login']) || $_SESSION['login'] == '') {
    redir('index.php');
} else {
    $uid = $_SESSION['login'];
}

// Get form data
$currentPassword = mysqli_real_escape_string($conn, $_POST['studentCurrentPassword']);
$newPassword = mysqli_real_escape_string($conn, $_POST['studentNewPassword']);
$confirmPassword = mysqli_real_escape_string($conn, $_POST['studentConfirmPassword']);

// Validate inputs
if(empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
    redir("student-settings.php?msg=All password fields are required");
}

// Check if new passwords match
if($newPassword != $confirmPassword) {
    redir("student-settings.php?msg=New passwords do not match");
}

// Check if new password is different from current
if($currentPassword == $newPassword) {
    redir("student-settings.php?msg=New password must be different from current password");
}

// Verify current password 
$sql = "SELECT password FROM user WHERE sl_id = $uid";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if($currentPassword != $user['password']) {
    redir("student-settings.php?msg=Current password is incorrect");
}



// Update password in database 
$updateSql = "UPDATE user SET password = '$newPassword' WHERE sl_id = $uid";
$res = mysqli_query($conn, $updateSql);

if($res) {
    redir('student-profile.php?msg=Password updated successfully');
} else {
    redir('student-settings.php?msg=Error updating password');
}
?>