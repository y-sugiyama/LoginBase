<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

/**
 * User Model
 *
 */
class User extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        //フィールド名
        'username' => array(
            //バリデーションの名前
            'Blank' => array(
                //バリデーションのルール
                'rule' => array('notBlank'),
                    //データ配列にkey(この場合はusername)が存在することを必要とする
                'required'=>'true',
                'message' => 'ユーザ名が入力されていません',
            ),
        ),
        //フィールド名
        'password' => array(
            //バリデーションの名前
            'notBlank' => array(
                //バリデーションのルール
                'rule' => array('notBlank'),
                     //create(新規追加)の時だけ､データ配列にkey(この場合はpassword)が存在することを必要とする
                     //editの時はデータ配列にkey(passwordフィールド)が存在しなくても処理を進められる
                'required' => 'create',
                'message' => 'パスワードが入力されていません',
            ),
        ),
        //フィールド名
        'role' => array(
            //バリデーションの名前
            'valid' => array(
                //バリデーションのルール
                'rule' => array('inList', array('admin', 'user')),
                   //データ配列にkey(この場合はrole)が存在することを必要とする
                'required'=>'true',
                'message' => '権限を選択してください',
                
                'allowEmpty' => false,
            ),
        ),
        //フィールド名
        'password_confirm' => [
            //バリデーションの名前
            'required' => [
                //バリデーションのルール
                'rule' => 'notBlank',
                   //データ配列にkey(この場合はpassword_confirm)が存在することを必要とする
                'required'=>'true',
                'message' => 'パスワード(確認)を入力してください'
            ],
            //バリデーションの名前
            'alphaNumeric' => [
                 //バリデーションのルール
                'rule' => 'alphaNumeric',
                'message' => 'パスワードは半角英数字のみで入力してください',
            ],
        ],
        //フィールド名
        'password_current' => [
            //バリデーションの名前
            'required' => [
                //バリデーションのルール
                'rule' => 'notBlank',
                   //データ配列にkey(この場合はpassword_current)が存在することを必要とする
                'required'=>'true',
                'message' => '現在のパスワードが入力されていません',
            ],
            //バリデーションの名前
            'match' => [
                //バリデーションのルール
                'rule' => 'checkCurrentPassword',
                'message' => '現在のパスワードが間違っています'
            ],
        ]
    );

    public function checkCurrentPassword($check) {


// 入力されたパスワード
        $password = array_values($check)[0];

// 入力された id に対応するユーザーを取得
        $user = $this->findById($this->data['User']['id']);

// 入力されたパスワード と ユーザーのパスワードが一致するかをチェック
        $passwordHasher = new BlowfishPasswordHasher();

        if ($passwordHasher->check($password, $user['User']['password'])) {
            return true;
        }

        return false;
    }

}
