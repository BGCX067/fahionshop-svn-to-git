<div class="contents view">
<h2><?php __('Ket Qua Tim Kiem');?></h2>

<!--aksfjskdf--->


 <ul class="products cols">
    <?php foreach ($contents as  $content) { ?>
	
    <li id="product_<?php echo $content['Product']['id']; ?>">

	<a href="<?php echo $this->webroot;?>products/show/<?php echo $content['Product']['id'];?>" class="p_img"><img width="100%" height="140px"style="margin-bottom:10px;" src='<?php echo $this->webroot;?>img/uploads/<?php echo $content['Product']['images']; ?>'></img></a>

    <div class="hide">
        <?php
            $img2=explode(";",$content['Product']['images']);
            if (count($img2)>0) 
           echo '<img class="product_preview_img" src="'.$this->webroot.'img/uploads/'.$img2[0].'" />';
        ?>
    </div>
    <script>product_tooltip("product_<?php echo $content['Product']['id']; ?>");</script>
  
	<div id="info_product">
	<?php echo $content['Product']['name']; ?>
    <div id="code_product"><?php echo $content['Product']['code']; ?></div>
    <span class="p_price"><?php echo $content['Product']['price']; ?></span>
    </div>
	
    </li>
    <?php } ?>
    </ul>
   

</div>






