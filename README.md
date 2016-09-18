# LoginBase

## 概要

ログインを必要とするサイトの為の雛形サイトです。
CakePHP 2.8 で作成しています。
[★デモページはこちら★](http://loginbase.sustainable-future.xyz/)

![概要](https://raw.githubusercontent.com/y-sugiyama/LoginBase/master/webroot/img/login_base.png)

## 要件

- PHP 5.6 以上
- MySQL 5 以上

## インストール方法

```
$ git clone https://github.com/y-sugiyama/LoginBase.git
$ cd LoginBase
$ composer install
```

## データベースのセットアップ

※事前に MySQL 内にデータベースを作成しておいてください。

database.php ファイルを作成

```
$ cp Config/database.php.default Config/database.php
```

database.php ファイルを編集

```
<?php
// Config/database.php

class DATABASE_CONFIG {

	public $default = array(
		'datasource'  => 'Database/Mysql',
		'persistent'  => false,
		'host'        => 'YOURE_HOSTNAME',
		'login'       => 'YOURE_USERID',
		'password'    => 'YOURE_PASSWORD',
		'database'    => 'YOURE_DATABASE',
		'prefix'      => '',
		'encoding'    => 'utf8',
	);

	public $test = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host'        => 'YOURE_HOSTNAME',
		'login'       => 'YOURE_USERID',
		'password'    => 'YOURE_PASSWORD',
		'database'    => 'YOURE_DATABASE',
		'prefix'     => '',
		'encoding' => 'utf8',
	);
}
```

データベースのテーブルを作成（マイグレーションの実行）
```
$ Console/cake Migrations.migration run all
```

## アプリケーションの起動

※ 事前にデータベースを起動しておいてください。

```
$ Console/cake server -p 8000
...
...
built-in server is running in http://localhost:8000/

```
## 画像の取り扱い(about copyrighted photo)
```
このサイトの画像や壁紙は、ぱくたそ(www.pakutaso.com）の写真素材を利用しています。この写真を継続して利用する場合は、ぱくたそ公式サイトからご自身でダウンロードしていただくか、ぱくたそのご利用規約(www.pakutaso.com/userpolicy.html）に同意していただく必要があります。同意しない場合は写真のご利用はできませんのでご注意ください。
```



