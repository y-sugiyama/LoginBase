<div class="users form">
<!--    AuthComponentの設定を読み込む-->
<?php echo $this->Flash->render('auth'); ?>
<!--     Formヘルパーを使ってフォームを作成する-->
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo 'ユーザ名とパスワードを入力してください'; ?></legend>
	<?php
//              Formヘルパーを使ってusername用､password用のフォームを呼び出す
		echo $this->Form->input('username');
		echo $this->Form->input('password');
	?>
	</fieldset>
<?php echo $this->Form->end('ログイン'); ?>
<!--</div>

