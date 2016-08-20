
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



                <h2 class="form-signin-heading"><?php echo '編集画面'; ?></h2>

                <?php echo $this->Form->create('User', ['novalidate' => 'novalidate']) ?>

                <div class="form-group <?php
                if ($this->Form->isFieldError('username')) {
                    echo 'has-error';
                }
                ?>">
                         <?php
                         echo $this->Form->input('username', [
                             'class' => 'form-control',
                             'placeholder' => 'Username'
                         ]);
                         ?>
                </div>

                <?php if ($login_user['role'] === 'admin') : ?>
                    <div class="form-group <?php
                             if ($this->Form->isFieldError('password')) {
                                 echo 'has-error';
                             }
                             ?>">
                             <?php
                             echo $this->Form->input('password', [
                                 'class' => 'form-control',
                                 'placeholder' => 'Password'
                             ]);
                             ?>
                    </div>
                    <?php endif; ?>
                    <?php if ($login_user['role'] === 'admin') : ?>
                    <div class="form-group">
                        <?php
                        echo $this->Form->input('role', array(
                            'type' => 'select',
                            'options' => [
                                'admin' => '管理者',
                                'user' => 'ユーザ'
                            ],
                            'class' => 'form-control',
                        ));
                        ?>
                    </div>
<?php endif; ?>

                <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo '更新'; ?></button>
<?php echo $this->Form->end(); ?> 

            </div>
        </div>
    </div>
</div>
