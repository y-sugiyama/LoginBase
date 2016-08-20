<h2 class="form-signin-heading"><?php echo 'ログアウト画面'; ?></h2>

<?php echo $this->Form->create('User', ['novalidate' => 'novalidate']) ?>

<div class="form-group <?php if($this->Form->isFieldError('username')) { echo 'has-error'; } ?>">
    <?php echo $this->Form->input('username', [
        'class'=>'form-control',
        'placeholder' => 'Username'
    ]); ?>
</div>

<div class="form-group <?php if($this->Form->isFieldError('password')) { echo 'has-error';}?>">
    <?php echo $this->Form->input('password', [  
        'class'=>'form-control',
        'placeholder' => 'Password'
    ]); ?>
</div>

<button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo 'ログアウト'; ?></button>
<?php echo $this->Form->end(); ?> 