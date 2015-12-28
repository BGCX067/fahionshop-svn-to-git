<div class="middle">

<?php e($form->create('User', array('id'=>'loginform', 'action' => 'login')));?>
	<p>
		<label>Tên đăng nhập<br />
		<?php e($form->text('username', array('class'=>'input','style'=>'BACKGROUND-COLOR: transparent','id'=>'user_login','size'=>'24'))); ?>
		</label>
		
	</p>
	<p>
		<label>Mật khẩu<br />
		<?php e($form->password('password', array('class'=>'input','style'=>'BACKGROUND-COLOR: transparent','id'=>'user_pass','size'=>'24'))); ?>
		</label>
	</p>
	<p class="forgetmenot"><label>
	<?php e($form->checkbox('remember_me',array('id='=>'rememberme','tabindex'=>'90'))) ?>
	
	Tự động đăng nhập lần sau</label></p>
	
		<?php echo $this->Form->submit('Đăng nhập', array('class'=>'button_submit'));?>
	
 <?php echo($form->end()); ?>
        </div>
