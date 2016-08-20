<!DOCTYPE html>
<html>
    <head>
    <?php echo $this->Html->charset(); ?>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<!--            タイトルが設定されていたらそれを表示する-->
        <title>
		<?php echo $this->fetch('title'); ?>
        </title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


	<?php
            echo $this->Html->meta('icon');
            echo $this->Html->css('style');
            echo $this->Html->css('front');
        ?>


        <!-- Latest compiled and minified JavaScript -->


		<?php
    
//              view側のctpファイルにmeta css scriptが書かれていれば適用します
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		?>
    </head>
    <body>
        <?php echo $this->element('navbar_front'); ?>

<!--        表示領域の幅全体に表示する-->
        <div id = "pageheader" class = "container-fluid ">
            
        <?php echo $this->fetch('topheader') ; ?>
        </div>
        
        <div class="container">
            
		<?php echo $this->Session->flash(); ?>
                
<!--                ctpファイルで個別の設定を読み込む-->
		<?php echo $this->fetch('content'); ?>
            
        </div>

	<?php echo $this->element('sql_dump'); ?>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
    </body>
</html>


