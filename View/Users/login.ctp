

<form class="form-login " novalidate="" method="post">


    <h2 class="form-login-heading"><?php echo 'ログイン画面'; ?></h2>
   <div class="form-group">
    <label for="inputUsername" >ユーザ名</label>
    <input type="text" name="data[User][username]" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
    <p class="help-block">ユーザ名が入力されていません</p>
   </div>
    <div class="form-group">
    <label for="inputPassword" >パスワード</label>
    <input type="password"  name="data[User][password]" id="inputPassword" class="form-control" placeholder="Password" required>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo 'ログイン'; ?></button>
</form>