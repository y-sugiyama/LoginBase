<div class="users view">
    
    <h2><?php echo __('ユーザ登録情報'); ?></h2>
  <table class="table table-bordered">  
    <tr>
        <th><?php echo __('Id'); ?></th>
        <th><?php echo __('ユーザ名'); ?></th>
    </tr>
    <tr>

        <td><?php echo h($user['User']['id']); ?></td>
        <td><?php echo h($user['User']['username']); ?></td>


    </tr>
  </table>
</div>


<br >
<a class="btn btn-default" href="/users/index" role="button">ユーザ一覧に戻る</a>
