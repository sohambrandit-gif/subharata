<?php include 'header.php'; ?>
<!-- Datatables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css?v=1">
<link rel="stylesheet" href="assets/css/dropzone.css">
<link rel="stylesheet" href="style.css" text="text/css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet" async>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js" defer="defer"></script>
<style>
  .dropzone .dz-preview .dz-image img {
    display: block;
    width: 100%;
}
.form-check {
    float: left;
    margin-left: 12px;
}
  </style>

<script type="text/javascript" defer="defer">
    $(document).ready(function() {
      $('#short_description').summernote({
		height: 300,
        tabsize: 2,
        followingToolbar: true,
		 callbacks: {
        onImageUpload: function(files) {
            sendFile(files[0]);
				}
			}
      });
    });
  </script>
<script type="text/javascript">
  function sendFile(file) {
  
    data = new FormData();
    data.append("file", file);
    url = "ajax_product_image_upload.php";
    $.ajax({
      data: data,
      type: "POST",
      url: url,
      cache: false,
      contentType: false,
      processData: false,
      success: function (url) {
	  	//console.log(url)
		var image = $('<img>').attr('src', url);
		$('#short_description').summernote("insertNode", image[1]);
      }
    });
  }

</script>
<!-- Page Wrapper -->
<div class="page-wrapper">
  <div class="content container-fluid">
    <!-- Page Header -->
    
    <!-- /Page Header -->
    
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Products for <?php echo get_cat($_GET['cat']); ?></h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example1">
                <thead>
                  <tr>
                    <th>#id</th>
                    <th>Manufacture</th>
                    <th>Title</th>
					<th>Price</th>
					<th>Stock</th>
					 <th>Status</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  
                  if($_GET['cat'] != ''){
                       $sql12 = "SELECT * FROM product where cat_id= ".$_GET['cat']." order by sl_id desc ";
                  }else{
                       $sql12 = "SELECT * FROM product  order by sl_id desc ";
                  }
				$res=mysqli_query($conn,$sql12);
				while($row=mysqli_fetch_array($res)){
				
				$filelist='';
				if(isset($_GET['prod_id']) && $_GET['prod_id']!=''){ 
				$sql3 = "SELECT * FROM images where product_id=".$_GET['prod_id']." order by image_id ";
				$res3 = mysqli_query($conn,$sql3);
				while($row3 = mysqli_fetch_array($res3)){
					$filelist .=$row3['image'].',';
				}
				$filelist = rtrim($filelist,',');
				}
				
				?>
                  <tr>
                    <td><?php echo $row['sku_id']; ?></td>
                    <td><?php echo get_manufacture($row['manufacture_id']); ?></td>
                    <td><?php echo $row['title']; ?></td>
					 <td>Rs <?php echo $row['price']; ?></td>
					  <td><?php echo $row['stock']; ?></td>
					<td> <?php if($row['valid']==0){ echo "Block"; }else{ echo "Active"; } ?> <?php if($row['featured']==1){ echo "Featured"; } ?> <?php if($row['new']==1){ echo "New"; } ?></td>
                    <td><div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
						
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);"> 
						 <?php if($row['valid']==0){ ?>
                          <a class="dropdown-item" href="product_action.php?cat=<?php echo $_GET['cat']; ?>&id=<?php echo $row['sl_id']; ?>&action=Active" >Set Active</a>
                          <?php } else { ?>
                          <a class="dropdown-item" href="product_action.php?cat=<?php echo $_GET['cat']; ?>&id=<?php echo $row['sl_id']; ?>&action=Block" >Set Block</a>
                          <?php } ?>
						   <?php if($row['stock']=='In Stock'){ ?>
                          <a class="dropdown-item" href="product_action.php?cat=<?php echo $_GET['cat']; ?>&id=<?php echo $row['sl_id']; ?>&action=Out of Stock" >Set Out of Stock</a>
                          <?php } else { ?>
                          <a class="dropdown-item" href="product_action.php?cat=<?php echo $_GET['cat']; ?>&id=<?php echo $row['sl_id']; ?>&action=In Stock" >Set In Stock</a>
                          <?php } ?>
						   <?php if($row['featured']==0){ ?>
                          <a class="dropdown-item" href="product_action.php?cat=<?php echo $_GET['cat']; ?>&id=<?php echo $row['sl_id']; ?>&action=Featured" >Set Featured</a>
                          <?php } else { ?>
                          <a class="dropdown-item" href="product_action.php?cat=<?php echo $_GET['cat']; ?>&id=<?php echo $row['sl_id']; ?>&action=Regular" >Set Regular</a>
                          <?php } ?>
                           <?php if($row['new']==0){ ?>
                          <a class="dropdown-item" href="product_action.php?cat=<?php echo $_GET['cat']; ?>&id=<?php echo $row['sl_id']; ?>&action=New" >Set New</a>
                          <?php } else { ?>
                          <a class="dropdown-item" href="product_action.php?cat=<?php echo $_GET['cat']; ?>&id=<?php echo $row['sl_id']; ?>&action=Old" >Set Old</a>
                          <?php } ?>
						<a class="dropdown-item" href="product.php?cat=<?php echo $_GET['cat']; ?>&prod_id=<?php echo $row['sl_id']; ?>#update">Edit</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="product_del.php?cat_id=<?php echo $_GET['cat']; ?>&id=<?php echo $row['sl_id']; ?>" onclick="return confirm('Do you want to delete the item?')">Delete</a> </div>
                      </div></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row" id="update">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Add Products</h4>
          </div>
          <div class="card-body">
            <form action="product_chk.php?id=<?php echo $_GET['prod_id']; ?>" method="post" enctype="multipart/form-data">
              
              <?php if(isset($_GET['prod_id']) && $_GET['prod_id']!=''){ 
              $sql12 = "SELECT * FROM product where sl_id=".$_GET['prod_id'];
			$res=mysqli_query($conn,$sql12);
			$row=mysqli_fetch_array($res);
			
				$filelist='';
				$sql3 = "SELECT * FROM images where product_id=".$_GET['prod_id']." order by image_id ";
				$res3 = mysqli_query($conn,$sql3);
				while($row3 = mysqli_fetch_array($res3)){
					$filelist .=$row3['image'].',';
				}
				//$filelist = rtrim($filelist,',');
              }
			?>
              <div class="row">
                <?php ?><div class="col-md-4">
                  <div class="form-group">
                    <label>Banner Image</label>
                    <input class="form-control" type="file" name="banner_image" >
                    <?php if($row['image']!=''){ ?>
                    <img src="<?php echo '../uploads/portfolio/'.$row['cat_id'].'/'.$row['image']; ?>" height="100" width=""/>
                    <?php } ?>
                  </div>
                </div><?php ?>
				
				 <div class="col-md-4">
                  <div class="form-group">
                    <label>Manufacturer Name</label>
                    <select name="manufacture"  class="form-control">
                        
                        <?php $sql_m = "SELECT * FROM manufacture  order by position  ";
        				$res_m=mysqli_query($conn,$sql_m);
        				while($row_m=mysqli_fetch_array($res_m)){
        				?>
                        
                        <option value="<?php echo $row_m['sl_id'] ?>" <?php if($row_m['sl_id'] == $row['manufacture_id'] ){ echo 'selected="selected"'; }?>><?php echo $row_m['name'] ?></option>
                        
                        <?php } ?>
                        
                    </select>
					 
                  </div>
                </div>
                
                <?php if(isset($_GET['prod_id']) && $_GET['prod_id']!=''){ ?>
                <input type="hidden" value="<?php echo $_GET['cat']; ?>" name="cat_id"/>
                <?php }else{ ?>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Category Name</label>
                    <select name="cat_id"  class="form-control">
                        
                        <?php $sql_c = "SELECT * FROM category  order by position  ";
        				$res_c=mysqli_query($conn,$sql_c);
        				while($row_c=mysqli_fetch_array($res_c)){
        				?>
                        
                        <option value="<?php echo $row_c['sl_id'] ?>" <?php if($row_c['sl_id'] == $_GET['cat'] ){ echo 'selected="selected"'; } ?>><?php echo $row_c['name'] ?></option>
                        
                        <?php } ?>
                        
                    </select>
					 
                  </div>
                </div>
				 <?php } ?>
				
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Brand Name</label>
                    <input type="text" class="form-control" name="title" required value="<?php if($row['title'] != '' ){echo $row['title'];}else{ echo '';} ?>">
                  </div>
                </div>
                
			
                	
                
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Manufacturer Price</label>
                    
                    <input type="number" class="form-control mr-2" name="manufacturer_price"  value="<?php  if($row['manufacturer_price'] != '' ){echo $row['manufacturer_price'];}else{ echo '0';}?>" required id="manufac_price">
                    
                 
                  </div>
                </div>
					<div class="col-md-4">
                  <div class="form-group">
                    <label>MRP</label>
					 <input type="text" class="form-control" name="mrp"  value="<?php echo $row['mrp']; ?>" placeholder ="" id="mrp">
                  </div>
                </div>
				<div class="col-md-4">
                  <div class="form-group">
                    <label>Price</label>
                    <div class="d-flex">
                    <input type="number" class="form-control" name="price"  value="<?php if($row['price'] != '' ){echo $row['price'];}else{ echo '0';} ?>" required id="sell_price">
                    <button type="button" onclick="calPrice()">Check</button>
                       </div>
                  </div>
                </div>
				<div class="col-md-6">
                  <div class="form-group">
                    <label>Profit</label>
                    
					 <input type="text" class="form-control" name="profit"  value="1000" placeholder ="" id="profit" readonly>
                  </div>
                </div>
                	<div class="col-md-6">
                  <div class="form-group">
                    <label>Percent</label>
					 <input type="text" class="form-control" name="percent"  value="10" placeholder ="" id="percent" readonly>
                  </div>
                </div>
         <div class="col-md-2">
                  <div class="form-group">
                    <label>Weight (Optional)</label>
					 <input type="text" class="form-control" name="weight"  value="<?php echo $row['weight']; ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>CGST</label>
                    <input type="number" class="form-control" name="cgst"  value="<?php  if($row['igst'] != '' ){echo $row['igst'];}else{ echo '0';}?>" required>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>SGST</label>
                    <input type="number" class="form-control" name="sgst"  value="<?php  if($row['igst'] != '' ){echo $row['igst'];}else{ echo '0';}?>" required>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>IGST</label>
                    <input type="number" class="form-control" name="igst"  value="<?php  if($row['igst'] != '' ){echo $row['igst'];}else{ echo '0';}?>" required>
                  </div>
                </div>
                 <div class="col-md-2">
                  <div class="form-group">
                    <label>HSN</label>
                    <input type="text" class="form-control" name="hsn"  value="<?php  if($row['hsn'] != '' ){echo $row['hsn'];}else{ echo '0';}?>" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Product Description (Optional)</label>
                    <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="short_description" id="short_description" ><?php echo $row['short_description']; ?></textarea>
                  </div>
                </div>
                 <div class="col-md-12" style="display:none;">
                  <div class="form-group">
                    <label>Usage (Optional)</label>
                    <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="usage" id="usage" ><?php echo $row['usage']; ?></textarea>
                  </div>
                </div> 
                 <div class="col-md-12" style="display:none;">
                  <div class="form-group">
                    <label>Precautions (Optional)</label>
                    <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here" name="precautions" id="precautions" ><?php echo $row['precautions']; ?></textarea>
                  </div>
                </div> 
		
              <input type="hidden" value="<?php echo $filelist; ?>" id="photo_list" name="photo_list"/>
             	<input type="hidden" value="" id="del_photo_list" name="del_photo_list"/>
               <div class="col-md-12">
                   <div class="form-group">
                    <label>Gallery</label>
                                    <div id="property_photos" class="dropzone" >
									<div class="fallback">
									  <input type="file" multiple name="photos[]" accept="application/msexcel" />
									</div>
								  </div>
                                </div>
                </div>              
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Sku ID Number</label>
					 <input type="text" class="form-control" name="sku_id" required value="<?php if($row['sku_id'] != '' ){echo $row['sku_id'];}else{ echo '0';}  ?>">
                  </div>
                </div>
                
           <div class="col-md-4">
                  <div class="form-group">
                    <label>Tags</label>
                    
                   <div>
                        
                         <div class="form-check">
                        <input type="checkbox" name="tags[]"  value="Festive"  class="form-check-input" id="Festive" <?php if(strpos($row['tags'], 'Festive')  !== false){ echo 'checked="checked"'; }?>>
                        <label for="Festive" class="form-check-label"> Festive</label>
                        </div>
                         <div class="form-check">
                        <input type="checkbox" name="tags[]"  value="Tradition"  class="form-check-input" id="Tradition" <?php if(strpos($row['tags'], 'Tradition')  !== false){ echo 'checked="checked"'; }?>>
                        <label for="Tradition" class="form-check-label"> Tradition</label>
                        </div>
                         <div class="form-check">
                        <input type="checkbox" name="tags[]"  value="Daily Wear"  class="form-check-input" id="Daily" <?php if(strpos($row['tags'], 'Daily Wear')  !== false){ echo 'checked="checked"'; }?>>
                        <label for="Daily" class="form-check-label"> Daily Wear</label>
                        </div>
                         <div class="form-check">
                        <input type="checkbox" name="tags[]"  value="Ethnic Wear"  class="form-check-input" id="Ethnic" <?php if(strpos($row['tags'], 'Ethnic Wear')  !== false){ echo 'checked="checked"'; }?>>
                        <label for="Ethnic" class="form-check-label"> Ethnic Wear</label>
                        </div>
                         <div class="form-check">
                        <input type="checkbox" name="tags[]"  value="Rani Collection"  class="form-check-input" id="Rani" <?php if(strpos($row['tags'], 'Rani Collection')  !== false){ echo 'checked="checked"'; }?>>
                        <label for="Rani" class="form-check-label"> Rani Collection</label>
                        </div>
                         <div class="form-check">
                        <input type="checkbox" name="tags[]"  value="Exclusive Designs"  class="form-check-input" id="Exclusive" <?php if(strpos($row['tags'], 'Exclusive Designs')  !== false){ echo 'checked="checked"'; }?>>
                        <label for="Exclusive" class="form-check-label"> Exclusive Designs</label>
                        </div>
                         <div class="form-check">
                        <input type="checkbox" name="tags[]"  value="Party Wear"  class="form-check-input" id="Party" <?php if(strpos($row['tags'], 'Party Wear')  !== false){ echo 'checked="checked"'; }?>>
                        <label for="Party" class="form-check-label"> Party Wear</label>
                        </div>
                         <div class="form-check">
                        <input type="checkbox" name="tags[]"  value="Bestseller"  class="form-check-input" id="Bestseller" <?php if(strpos($row['tags'], 'Bestseller')  !== false){ echo 'checked="checked"'; }?>>
                        <label for="Bestseller" class="form-check-label"> Bestseller</label>
                        </div>
                        <div class="form-check">
                        <input type="checkbox" name="tags[]"  value="Office Wear"  class="form-check-input" id="Office" <?php if(strpos($row['tags'], 'Office Wear')  !== false){ echo 'checked="checked"'; }?>>
                        <label for="Office" class="form-check-label"> Office Wear</label>
                        </div>
                        <div class="form-check">
                        <input type="checkbox" name="tags[]"  value="Buy 2 Get 1"  class="form-check-input" id="Buy 2 Get 1" <?php if(strpos($row['tags'], 'Buy 2 Get 1')  !== false){ echo 'checked="checked"'; }?>>
                        <label for="Buy 2 Get 1" class="form-check-label"> Buy 2 Get 1</label>
                        </div>
                        <div class="form-check">
                        <input type="checkbox" name="tags[]"  value="Buy 2 Combo"  class="form-check-input" id="Buy 2 Combo" <?php if(strpos($row['tags'], 'Buy 2 Combo')  !== false){ echo 'checked="checked"'; }?>>
                        <label for="Buy 2 Combo" class="form-check-label"> Buy 2 Combo</label>
                        </div>
                         
                        
                   </div>     
					 
                  </div>
                </div>
                
         <div class="col-md-4">
                  <div class="form-group">
                    <label>Detail Page</label>
                    
                   <div>
                        
                        <div class="form-check">
                        <input type="radio" name="product_detail_type"  value="1"  class="form-check-input" id="multiple" <?php if($row['product_detail_type'] == '1'){ echo 'checked="checked"'; }?>>
                        <label for="multiple" class="form-check-label"> Multiple Product</label>
                        </div>
                        
                        <div class="form-check">
                        <input type="radio" name="product_detail_type"  value="2"  class="form-check-input" id="single" <?php if($row['product_detail_type'] == '2'){ echo 'checked="checked"'; }?>>
                        <label for="single" class="form-check-label"> Single Product</label>
                        </div>
                        
                   </div>     
					 
                  </div>
                </div>
                
              <div class="col-md-12">
              <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- /Page Wrapper -->
</div>
<!-- /Main Wrapper -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="assets/js/dropzone.js"></script>
<script>
  var imagesUploaded = true;
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("#property_photos", {
	url: "ajax_upload_images.php",
	maxFiles: 12,
	addRemoveLinks: true,
	init: function() {
    <?php 
			if(isset($_GET['prod_id']) && $_GET['prod_id']!=''){ 
			$sql3 = "SELECT * FROM images where product_id=".$_GET['prod_id']." order by image_id ";
			$res3 = mysqli_query($conn,$sql3);
			while($row3 = mysqli_fetch_array($res3)){
	?>
	 var mockFile = { name: "<?php echo $row3['image']; ?>", size: "<?php echo filesize("../uploads/portfolio/".$_GET['cat']."/".$row3['image']);?>", type: '', cfilename: '<?php echo $row3['image']; ?>' };       
	 this.options.addedfile.call(this, mockFile);
	 this.files.push(mockFile);
	 this.options.thumbnail.call(this, mockFile, "../uploads/portfolio/<?php echo $_GET['cat']; ?>/<?php echo $row3['image']; ?>");
	 mockFile.previewElement.classList.add('dz-success');
	 mockFile.previewElement.classList.add('dz-complete');
	 <?php } 
			}
	 ?>
		this.on("sending", function(file, xhr, formData){
		file.cfilename = '' + new Date().getTime()+Math.floor(Math.random() * 999999);
		formData.append("cat_id",'<?php echo $_GET['cat'];?>');
		formData.append("filename", file.cfilename);
		//console.log('sending')
		$('#file_upload_sec').show();
		if(imagesUploaded) {
			imagesUploaded = false;
		}
	}),
	this.on("success", function(file, xhr){
		file.cfilename = xhr;
		$('#photo_list').val($("#photo_list").val()+xhr+",");
	}),
	this.on("maxfilesexceeded", function(file){
		this.removeFile(file);
		alert('Max 10 files allowed');
	}),
	this.on("queuecomplete", function(){
		imagesUploaded = true;
		//alert('success', 'Photos Uploaded Successfully');
	}),
	this.on("removedfile", function(file){
		console.log(file.cfilename)
		$.ajax({
			url: "ajax_delete_images.php",
			type: "post",
			data: {'file_name': file.cfilename,'cat_id': '<?php echo $_GET['cat'];?>'},
			success: function (ajaxResponse) {
			console.log(ajaxResponse)
			var input_val = $("#photo_list").val().toString();
						
			var ret = input_val.replace(file.cfilename+',','');
				$("#del_photo_list").val($("#del_photo_list").val()+file.cfilename+',');
				$('#photo_list').val(ret);
				if($('#photo_list').val() == ''){
					$('#file_upload_sec').hide();
				}
			}
		});
	})
},
});
function set_file_type(val){
	myDropzone.options.acceptedFiles =  'application/*';
	console.log(myDropzone)
}
  </script>
<script>
$(document).ready(function() {
    $('#example1').DataTable( {
        "order": [[ 0, "desc" ]],
        
    } );
} );

  
  function calPrice(){
     // alert(val);
     
     
     
     
     var manufac_price =  parseInt($('#manufac_price').val());
     var sell_price =  parseInt($('#sell_price').val());
     var mrp =  parseInt($('#mrp').val());
     
     $('#profit').val(sell_price - manufac_price);
     
     var sell = ((mrp - sell_price)/mrp)*100;
     $('#percent').val(parseInt(sell));
  }
    </script>
<?php include 'footer.php'; ?>