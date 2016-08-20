<?php
$this->assign('title','Loginbase Top');
?>

<!-- Jumbotron -->
<?php
$this->start('topheader');
?>
<div class="topimage">
    <div class="container">
        <div class="squere">
            <h1>Loginbase Top</h1>
            <p class="lead">ログイン機能を実装したwebサイトの基盤となるものです</p>
        </div>
    </div>
</div>

<?php
$this->end();
?>
<!-- Example row of columns -->
<div class="row">
    <div class="col-lg-4" >
        <span class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></span>
        <h2>全体</h2>
        <p> 
            フレームワークは CakePHP2.8.6 を使用しています。
            CakePHPのプロジェクトはComposer を使って作成しています。
            DBの管理にマイグレーションを使用しています。
            フロントエンド、バックエンド共に CSS フレームワークに Bootstrap3を使用しています。

        </p>

    </div>
    <div class="col-lg-4">
        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
        <h2>フロントエンド</h2>
        <p>
            トップにメニューを設け、ページの移動を可能とする。
            ヘッダー、フッター、レイアウトは各ページ共通とする。
            トップページのみ個別のレイアウトとする。
        </p>
    </div>
    <div class="col-lg-4">
        <span class="glyphicon glyphicon-tower" aria-hidden="true"></span>
        <h2>バックエンド</h2>
        <p>
            左サイドにメニューを設ける
            ユーザー名、パスワードでログイン可能とする。
            パスワードは暗号化する。
            ユーザーの一覧表示、詳細表示、追加、変更、削除を可能とする。
            ユーザーには管理者と一般ユーザーの役割を持たせる。
            管理者のみがユーザー管理を可能とする。
        </p>
    </div>
</div>

<!-- Site footer -->
<footer class="footer">
    <p>&copy; 2016 Yuriko Sugiyama.</p>
</footer>
