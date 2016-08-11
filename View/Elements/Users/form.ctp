
<form class="form-signin " novalidate="" method="post">
            <h2 class="form-signin-heading"><?php echo $text . 'してください'; ?></h2>
            <label for="inputUsername" class="sr-only">ユーザ名</label>
            <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
            <label for="inputPassword" class="sr-only">パスワード</label>
            <input type="password"  name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        
            <div class="checkbox">
            <label>
            <input type="checkbox" value="remember-me"> 次回以降入力を省略
            </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo $text; ?></button>
        </form>

