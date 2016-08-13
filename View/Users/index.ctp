

<div class="users index">

    <div class="container">

        <!-- content -->
        <div class="row" style="padding:5px 0 0 0">
            <!-- left -->
            <div class="col-md-3">   
                
            <?php echo $this->element('menu_admin'); ?>

            </div>

            <!-- center -->
            <div class="col-md-9" style="background-color:white">
                    <h2><?php echo 'ユーザ一覧'; ?></h2>
                    
                   
                    <p><?php echo $this->Html->link('ユーザ新規追加', array('controller'=>'users','action' => 'add')); ?></p>
                       

            <?php echo $this->fetch('content'); ?>
               <table class="table table-striped">

	<?php foreach ($users as $user): ?>
                   <tr>
                       <th>ユーザ名</th>
                       <th>権限</th>
                       <th>アクション</th>
                   </tr>
                        <tr>
                           
                            <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                            <td class="actions">
			<?php echo $this->Html->link('詳細', array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link('編集', array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?>
                            </td>
                        </tr>
<?php endforeach; ?>
                    
                </table>
                    
                                          </div>

        </div>

    </div>
    <!-- ビューで表示したいものはここに配置します。 -->

</div>




