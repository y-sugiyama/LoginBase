<h2>パスワード変更</h2>

<?php echo $this->Form->create('User', ['novalidate' => 'novalidate']) ?>


<div class="form-group <?php if($this->Form->isFieldError('password_current')) { echo 'has-error'; } ?>">
    <?php echo $this->Form->input('password_current',[
        'label' => '現在のパスワード',
        'type' => 'password',
        'class' => 'form-control'
    ]); ?>
</div>

<div class="form-group <?php if($this->Form->isFieldError('password')) { echo 'has-error'; } ?>">
    <?php echo $this->Form->input('password',[
        'label' => '新パスワード',
        'type' => 'password',
        'class' => 'form-control'
    ]); ?>
</div>

<div class="form-group <?php if($this->Form->isFieldError('password_confirm')) { echo 'has-error'; } ?>">
    <?php echo $this->Form->input('password_confirm',[
        'label' => 'パスワード（確認）',
        'type' => 'password',
        'class' => 'form-control',
    ]); ?>
</div>

<?= $this->Form->hidden('id'); ?>


<button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo '更新'; ?></button>
<?= $this->Form->end(); ?>
