<?php include "../global/connection.php";

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

?>
<?php
$sl_id = $_GET['id'];
$cat_id = $_POST['cat_id'];
$title = mysqli_real_escape_string($conn, trim($_POST['title']));
$short_description = mysqli_real_escape_string($conn, $_POST['short_description']);
$usage = isset($_POST['usage']) ? mysqli_real_escape_string($conn, $_POST['usage']) : null;
$precautions = isset($_POST['precautions']) ? mysqli_real_escape_string($conn, $_POST['precautions']) : null;
$weight = mysqli_real_escape_string($conn, $_POST['weight']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$hsn = mysqli_real_escape_string($conn, $_POST['hsn']);
$sku_id = mysqli_real_escape_string($conn, str_replace(' ', '-', trim($_POST['sku_id'])));
$featured = isset($_POST['featured']) ? 1 : 0; // Assuming featured is a checkbox
$mrp = mysqli_real_escape_string($conn, $_POST['mrp']);
$stock = mysqli_real_escape_string($conn, $_POST['stock']);
$tags = isset($_POST['tags']) ? mysqli_real_escape_string($conn, implode(", ", $_POST['tags'])) : null;
$cgst = mysqli_real_escape_string($conn, $_POST['cgst']);
$sgst = mysqli_real_escape_string($conn, $_POST['sgst']);
$igst = mysqli_real_escape_string($conn, $_POST['igst']);
$manufacture_id = mysqli_real_escape_string($conn, $_POST['manufacture_id']);
$manufacturer_price = mysqli_real_escape_string($conn, $_POST['manufacturer_price']);



if ($sl_id == '') {
    // Insert new product
    $sql1 = "INSERT INTO product (
        cat_id, 
        manufacture_id, 
        manufacturer_price, 
        image, 
        title, 
        short_description, 
        `usage`, 
        precautions, 
        weight, 
        price, 
        hsn, 
        sku_id, 
        featured, 
        mrp, 
        stock, 
        tags, 
        cgst, 
        sgst, 
        igst
    ) VALUES (
        '$cat_id',
        '$manufacture_id',
        '$manufacturer_price',
        '$image',
        '$title',
        '$short_description',
        '$usage',
        '$precautions',
        '$weight',
        '$price',
        '$hsn',
        '$sku_id',
        '$featured',
        '$mrp',
        '$stock',
        '$tags',
        '$cgst',
        '$sgst',
        '$igst'
    )";
    $res = mysqli_query($conn, $sql1);
    $sl_id = mysqli_insert_id($conn);
} else {
    // Update existing product
    $sql1 = "UPDATE product SET 
        cat_id = '$cat_id',
        manufacture_id = '$manufacture_id',
        manufacturer_price = '$manufacturer_price',
        title = '$title',
        short_description = '$short_description',
        `usage` = '$usage',
        precautions = '$precautions',
        weight = '$weight',
        price = '$price',
        hsn = '$hsn',
        sku_id = '$sku_id',
        featured = '$featured',
        mrp = '$mrp',
        stock = '$stock',
        tags = '$tags',
        cgst = '$cgst',
        sgst = '$sgst',
        igst = '$igst'";
    
    // Only update image if a new one was uploaded
    
    $sql1 .= " WHERE sl_id = '$sl_id'";
    $res = mysqli_query($conn, $sql1);
}

// Handle image uploads and deletions if needed
if (isset($_POST['photo_list']) && $_POST['photo_list'] != '') {
    $file_list = explode(",", rtrim($_POST['photo_list'], ","));
    // Process file uploads
}

if (isset($_POST['del_photo_list']) && $_POST['del_photo_list'] != '') {
    $del_file_list = explode(",", rtrim($_POST['del_photo_list'], ","));
    // Process file deletions
}

if ($_FILES['image']['name']!='') {  // Changed 'banner_image' to 'image' to match schema
    $tempFile = $_FILES['image']['tmp_name'];          //3             
    $targetPath = '../uploads/portfolio/'.$cat_id."/"; 
    $ext = end((explode(".", $_FILES['image']['name'])));
    $file_name = 'image'.date('ymdhis').'.'.$ext;
    $targetFile = $targetPath.$file_name;  //5
    move_uploaded_file($tempFile, $targetFile); //6
    $image = $file_name;
                
    $sql1 = "update product set image='$image' where sl_id='$sl_id'";
    $res=mysqli_query($conn,$sql1);
}

$sql2 = "delete from images where product_id = $sl_id ";
mysqli_query($conn, $sql2);

foreach ($file_list as $file) {
    $sql1 = "INSERT INTO images (product_id,image) VALUES ('$sl_id', '$file')";
    $res = mysqli_query($conn, $sql1);
}

foreach ($del_file_list as $file) {
    $targetPath = '../uploads/portfolio/'.$cat_id."/";  
    if(file_exists($targetPath."/".$file)){             
        unlink($targetPath."/".$file);
    }
}

$sql_product = "SELECT * FROM product where sl_id='$sl_id'"; 
$res_product=mysqli_query($conn,$sql_product);
while($row_product=mysqli_fetch_array($res_product)){
        
    $sql3 = "SELECT * FROM images where product_id=".$row_product['sl_id']." order by image_id ";
    $res3 = mysqli_query($conn,$sql3);
    $s='';
    while($row3 = mysqli_fetch_array($res3)){
        $file_data = (explode(".", $row3['image']));
        $s.= str_replace(' ','',trim($file_data[0])).', ';
    }
    
    // Removed the update of 'code' field as it doesn't exist in your schema
}

if($res){
    header('location: product.php?cat='.$cat_id.'&success');
}else{
    header('location: product.php?cat='.$cat_id.'&error');
}
?>
