
<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<form class="form-horizontal">
  <div class="form-group">
    <label for="inputUsername3" class="control-label">ユーザ名</label>
      <input type="text" class="form-control" id="inputName" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="control-label">パスワード</label>
      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
  </div>
  <div class="form-group">
      <div class="checkbox">
        <label>
          <input type="checkbox"> 次回以降入力を省略
        </label>
    </div>
  </div>
  <div class="form-group">
      <button type="submit" class="btn btn-default"><?php echo $text; ?></button>
  </div>
</form>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>