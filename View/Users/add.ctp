<div class="admin form">
    <?php
        echo $this->Form->create('User');
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('role', array(
            'options' => array('admin' => '管理者',  'auther' => 'ユーザ')
        ));
        echo $this->Form->end('アカウントを作成する');
    ?>
</div>

<!--</div>
<div class="actions">
<br>
	<h3><?php echo __('Actions'); ?></h3>-->
	
<?php echo $this->Html->link('ユーザ一覧へ戻る', array('action' => 'index')); ?>
	
</div>
