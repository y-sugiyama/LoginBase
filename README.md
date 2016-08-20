# LoginBase

ログインシステムの基盤になるようなコードです.

***

##必要条件
***

* CakePHP 2.8.6 を使用しています
* PHP5.6以上を使用してください
* Plugin"cakedc/migrations": "~2.4.0"を使用しているため､MySQLの使用が必要です

##インストール方法
***
* Composerを使ってプラグインをインストールします｡場所は､composer.jsonがあるCakePHPプロジェクトのルートディレクトリです｡

```:ターミナル
composer require cakedc/migrations "~2.4.0"
```
```:ターミナル
composer require cakephp/debug_kit" "2.2.*"
```
* プラグインをロードします
```php:bootstrap.php
CakePlugin::loadAll();
```

* 以下からgit cloneしてください｡
```
https://github.com/y-sugiyama/LoginBase.git
```