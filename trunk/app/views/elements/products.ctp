    <?php 
    if(!empty($data)) {
    
    $data = $bs->productArray($data);
    //debug($data);
    
     ?>

    <ul class="products cols">
    <?php foreach ($data as  $row) { ?>
    <li id="product_<?php echo $row['id']; ?>">

	<a href="<?php echo $this->webroot;?>products/show/<?php echo $row['id'];?>" class="p_img"><img width="100%" height="140px"style="margin-bottom:10px;" src='<?php echo $this->webroot;?><?php echo $row['detail_image_1']; ?>'></img></a>
	<!--a href="<?php echo $this->webroot;?>products/show/<?php echo $row['id'];?>" class="p_img"><img width="100%" height="140px"style="margin-bottom:10px;" src='<?php //echo $this->webroot;?>img/uploads/<?php //echo $row['images']; ?>'></img></a-->

    <div class="hide">
        <?php
            $img2=explode(";",$row['detail_image_1']);
           if (count($img2)>0) 
			 echo '<img class="product_preview_img" src="'.$this->webroot.$img2[0].'" />';
          // echo '<img class="product_preview_img" src="'.$this->webroot.'img/uploads/'.$img2[0].'" />';
        ?>
    </div>
    <script>product_tooltip("product_<?php echo $row['id']; ?>");</script>
  
	<div id="info_product">
    <a href="<?php echo $this->webroot;?>products/show/<?php echo $row['id']; ?>" class="p_name"><?php echo ($row['name']); ?></a> 
    <div id="code_product"><?php echo $row['code']; ?></div>
    <span class="p_price"><?php echo $row['price']; ?></span>
    </div>
	
    </li>
    <?php } ?>
    </ul>
    <?php } ?>
