<nav class="navbar navbar-default">

  <div class="container-fluid">

    <!-- Brand and toggle get grouped for better mobile display -->
   
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
               data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
       
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/users/index">Loginbase管理者画面</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
      
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><?php echo $this->Html->link('ホーム', array('controller'=>'users','action' => 'index')); ?></li>
     
      </ul>
    
            <ul class="nav navbar-nav navbar-right">
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo 'こんにちは'.$login_user['username']. 'さん'; ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link('パスワード変更', array('controller'=>'users','action' => 'change_password')); ?></li>
                       
                        <li><?php echo $this->Html->link('ユーザ情報変更', array(
                            'controller'=>'users',
                            'action' => 'edit', 
                            $login_user['id'],
                            )); ?></li>
                                                          
                    
                        
                        
                        
                        <li role="separator" class="divider"></li>
                       <li><?php echo $this->Html->link('ログアウト', array('controller'=>'users','action' => 'logout')); ?></li>
                    </ul>
                </li>
            </ul>
        

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>