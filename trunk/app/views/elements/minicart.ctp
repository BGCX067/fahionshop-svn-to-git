<?php 
$items = 0;
$total =  $price->currency(0);
$data = $this->requestAction('/orders/cart_contents/');
?>
<div class="popup">
<table class="facebook_">
  <tbody>
    <tr>
      <td class="tl"></td><td class="b"></td><td class="tr"></td></tr>
    <tr>
      <td class="b"></td>
      <td class="body">
        <div class="footer">
          <div class="title_form_registerservice"><div class="ic"></div><div style="padding-top: 8px;" class="ctitle"></div></div>
        </div>
        <div class="content___">
            <table bordercolor="#e8e8e8" border="1" width="550" style="border-collapse: collapse;">
                 <tbody><tr height="29" bgcolor="#e6e6e6">
                    <td width="238" style="padding-left: 5px;"><b><?php __('Product');?></b></td>
                    <td align="center" width="68"><b><?php __('Quantity');?></b></td>
                    <td align="center" width="133"><b><?php __('Price');?></b></td>
                    <td align="center"><b><?php __('Remove');?></b></td>
                </tr>
                 <?php
                    if(!empty($data['LineItem'])) {
                        $cartClass = '';
                        if (isset($this->params['named']['cart'])) {
                            $cartClass = ' class="blink"';
                        }
                        echo $session->read('CartMesssage');
                        if  (!empty($data['Order']['total'])) $total = $price->currency($data['Order']['total']);           
                     foreach ($data['LineItem'] as $row) { 
                        //debug($row);
                        $items += $row['quantity'];    
                  ?>
                  <tr height="29">
                    <td style="padding-left: 5px;"><a href="<?php echo $html->url('/products/show/' . $row['Product']['id']); ?>"><?php echo $row['Product']['name']; ?></a></td>
                    <td align="center"><?php echo $row['quantity']; ?></td>
                    <td align="center"><?php echo $price->currency($data['Order']['subtotal']); ?></td>
                    <td align="center"><a href="<?php echo $this->webroot.'line_items/delete/'.$row['id'];?>"><?php echo $html->image('popup_08.gif');?></a></td>
                 </tr> 
                 <?php }}?>          
               
                <tr height="29">
                    <td bgcolor="#e6e6e6" style="padding-left: 5px;"><b><?php __('Shipping');?></b></td>
                    <td bgcolor="#f4f1bf" align="center" colspan="3"><b><?php echo $price->currency($data['Order']['shipping_handling']);?></b></td>
                </tr>
                 <tr height="29">
                    <td bgcolor="#e6e6e6" style="padding-left: 5px;"><b><?php __('Total');?></b></td>
                    <td bgcolor="#f4f1bf" align="center" colspan="3"><b><?php echo $total;?></b></td>
                </tr>
                <tr height="29">
                    <td colspan="4">
                        <table bgcolor="#ffffff" width="100%">
                            <tbody><tr height="43">
                                <td align="right"><a href="<?php echo $html->url('/orders/show/'); ?>" class="chitiet"></a></td>
                                <td><a href="<?php echo $html->url(array('controller' => 'orders', 'action' => 'checkout')); ?>" class="cartcal"></a></td>
                            </tr>
                            <tr>
                                <td colspan="2"><hr size="1" color="#e3e3e3"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td align="right"><?php echo $html->image('popup_12.gif', array('onclick'=>'close_order();','style'=>'cursor:pointer;','id'=>'close'));?></td>
                            </tr>
                        </tbody></table>
                    </td>
            </tr></tbody></table>
            </div>
                  </td>
      <td class="b"></td>
    </tr>
    <tr>
      <td class="bl"></td><td class="b"></td><td class="br"></td></tr>
  </tbody>
</table></div> 
<script type='text/javascript'>
$(document).ready(function(){
  $("#item").html($("#item").html()+'<?php echo $items;?>' );
  $("#total").html($("#total").html()+'<?php echo $total;?>' );  
  $(".ctitle").html('<?php echo sprintf(__("Your cart have %s item(s)", true),$items);?>');
});
</script>
