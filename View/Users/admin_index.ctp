

<div class="users index">
	<h2><?php echo 'ユーザ一覧'; ?></h2>

        <div class="container">

    <!-- content -->
    <div class="row" style="padding:60px 0 0 0">
        <!-- left -->
        <div class="col-md-3">
            <!-- パネルで囲む -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Menu
                </div>
                <!-- 敢えてbodyを作らないことで、メニューを詰める -->
                <!-- <div class="panel-body"> -->
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="/users/index"><i class="glyphicon glyphicon-pencil"></i> ユーザ</a></li>
                    <li><a href="/users/add"><i class="glyphicon glyphicon-download"></i> ユーザ新規登録</a></li>
                    <li><a href="/users/edit"><i class="glyphicon glyphicon-leaf"></i> ユーザ情報編集</a></li>
                </ul> 
                <!-- </div> -->
            </div>
        </div>

        <!-- center -->
        <div class="col-md-9" style="background-color:white">
            <?php echo $this->fetch('content'); ?>
	<table cellpadding="0" cellspacing="0">
	
	<tbody>
            

	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>

        </div>

    </div>

</div>
<!-- ビューで表示したいものはここに配置します。 -->

</div>
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
	</ul>-->
</div>
