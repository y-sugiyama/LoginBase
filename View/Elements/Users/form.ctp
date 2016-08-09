
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $text . '画面'; ?></title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link href="signin.css" rel="stylesheet">


</head>
<body>

    <div class="container">

        <form class="form-signin">
            <h2 class="form-signin-heading"><?php echo $text . 'してください'; ?></h2>
            <label for="inputUsername" class="sr-only">ユーザ名</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
            <label for="inputPassword" class="sr-only">パスワード</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        
            <div class="checkbox">
            <label>
            <input type="checkbox" value="remember-me"> 次回以降入力を省略
            </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo $text; ?></button>
        </form>

    </div>
 
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>

