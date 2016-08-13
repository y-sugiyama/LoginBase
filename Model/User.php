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
        'username' => array(
        'notBlank' => array(
        'rule' => array('notBlank'),
        'message' => 'ユーザ名が入力されていません',

        ),
        ),
        'password' => array(
        'notBlank' => array(
        'rule' => array('notBlank'),
        'message' => 'パスワードが入力されていません',

        ),
        ),
        'role' => array(
        'valid' => array(
        'rule' => array('inList', array('admin', 'user')),
        'message' => '権限を選択してください',
        'allowEmpty' => false
        ),
        ),
        'password_confirm' => [
            'required' => [
              'rule' => 'notBlank',
              'message' => 'パスワード(確認)を入力してください'
            ],
        ],
        'password_current' => [
            'required' => [
               'rule' => 'notBlank',
               'message' => '現在のパスワードが入力されていません',
            ],
            'match' => [
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
