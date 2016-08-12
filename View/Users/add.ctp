<form class="form-signin   " novalidate="" method="post">

    
    <h2 class="form-signin-heading"><?php echo '新規登録画面'; ?></h2>
    
    <div class="form-group <?php if(isset($this->validationErrors['User']['username'])){
           echo 'has-error';      
    }?>">
       
    <label for="inputUsername" >ユーザ名</label>
    <input type="text" name="data[User][username]" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
      <?php if(isset($this->validationErrors['User']['username'])) :?>
        <p class="help-block"><?php echo $this->validationErrors['User']['username'][0]; ?></p>
        <?php endif;?>
    </div>
    
      <div class="form-group <?php if(isset($this->validationErrors['User']['password'])){
           echo 'has-error';      
    }?>">
    <label for="inputPassword">パスワード</label>
    <input type="password"  name="data[User][password]" id="inputPassword" class="form-control" placeholder="Password" required>
     <?php if(isset($this->validationErrors['User']['password'])) :?>
        <p class="help-block"><?php echo $this->validationErrors['User']['password'][0]; ?></p>
        <?php endif;?>
    </div>
    
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
            選択する
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="role">
            <li role="admin"><a href="">管理者</a></li>
            <li role="user"><a href="">ユーザ</a></li>
        </ul>
    </div>


    <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo '新規登録'; ?></button>
</form>