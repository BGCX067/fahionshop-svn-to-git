<script src="<?php echo $this->webroot?>js/jquery.validate.js" type="text/javascript"></script>    
<div id="content">
<?php echo $this->Form->create('Country', array('id' => 'form_country', 'action' => 'add'));?>

		<div class="grid_9">
			<h2 class="dashboard">Thêm mới quốc gia</h2>
		</div>
		
	<fieldset>
	<div id="fixed"><img src="<?php echo $this->webroot;?>img/icons/package.gif" width="16" height="16" alt="" /> Vui lòng nhập đủ dữ liệu cho các mục có đánh dấu &nbsp;<font color="#ff0000">*</font></div>

	<table cellspacing="5" cellpadding="0" border="0" id="payblock" style="display: block;">
	  <tbody>
		  
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Kích hoạt: </strong></font></td>
				<td class="line_light"><?php echo $this->Form->input('active');?></td>
		   </tr>
		  	<tr>
				<td width="120" align="right" class="line_light"><strong>Mã quốc gia: </strong> &nbsp;<font color="#ff0000">*</font></td>
				<!--<td class="line_light"><?php// echo $this->Form->input('code3');?></td>-->
				<td class="line_light"><?php echo $this->Form->input('code3',array('label'=>'','size'=>'30','class'=>'required lettersonly'));?>
		   </tr>
		   	<tr>
				<td width="120" align="right" class="line_light"><strong>Tên : </strong></font></td>
				<td class="line_light"><?php echo $this->Form->input('name');?></td>
				
		   </tr>
	</tbody>
	</table>
	 <div id="inputfile"></div>
	</fieldset>
<?php //echo $this->Form->end(__('Submit', true));?>
<?php echo $this->Form->submit('Lưu', array('class'=>'button_submit'));?>
<?php echo $this->Html->link('<span>Quay lại</span>', array('controller'=>$this->params['controller'], 'action'=>'index'), array('class'=>'button', 'escape'=>false));?>
</div>
						 					

<script type="text/javascript">
$(document).ready(function(){     
    $("#form_country").validate();
});
jQuery.extend(jQuery.validator.messages, {
    required: "<?php __("Thông tin bắt buộc phải điền.");?>",
    remote: "<?php __("Please fix this field.");?>",
    email: "<?php __("Email bạn nhập không hợp lệ.");?>",
    number: "<?php __("Vui lòng nhập số.");?>",
    
});
jQuery.validator.addMethod("phone", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, ""); 
    return this.optional(element) || phone_number.length > 9 &&
        phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
}, "<?php __("Số điện thoại bạn nhập không hợp lệ.");?>");

jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z ]+$/i.test(value);
}, "<?php __("Vui lòng nhập ký tự");?>"); 

</script>

