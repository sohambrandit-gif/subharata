<?php include "../global/connection.php"; ?>
<?php
session_destroy();
header('location: index.php?error');
?>