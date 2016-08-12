

<form class="form-edit has-error " novalidate="" method="post">

    <h2 class="form-edit-heading"><?php echo '編集画面'; ?></h2>

    <div class="form-group">
        <label for="inputUsername" >ユーザ名</label>
        <input type="text" name="data[User][username]" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
         <?php if(isset($this->validationErrors['User']['username'])) :?>
        <p class="help-block"><?php echo $this->validationErrors['User']['username'][0]; ?></p>
        <?php endif;?>
    </div>

    <div class="form-group">
        <label for="inputPassword" >パスワード</label>
        <input type="password"  name="data[User][password]" id="inputPassword" class="form-control" placeholder="Password" required>
         <?php if(isset($this->validationErrors['User']['password'])) :?>
        <p class="help-block"><?php echo $this->validationErrors['User']['password'][0]; ?></p>
        <?php endif;?>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo '編集を完了'; ?></button>
</form>

<br >
<a class="btn btn-default" href="/users/index" role="button">ユーザ一覧に戻る</a>