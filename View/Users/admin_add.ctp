<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo 'ユーザ新規登録'; ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
	?>
	</fieldset>
<?php echo $this->Form->end('新規登録'); ?>
<!--</div>
<div class="actions">
<br>
	<h3><?php echo __('Actions'); ?></h3>-->
	
<?php echo $this->Html->link('ユーザ一覧へ戻る', array('action' => 'index')); ?>
	
</div>
