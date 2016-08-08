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
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'role' => array(
                    'valid' => array(
                        'rule' => array('inList', array('admin', 'author')),
                        'message' => '権限を選択してください',
                        'allowEmpty' => false
                    )
                )
	);
        
        public function beforeSave($options = array()) {
            //入力されたパスワードを CakePHP の AuthComponent::password() を使ってハッシュ化して、データベースに直接平文のパスワードが入らないようになっています。
                    if (isset($this->data[$this->alias]['password'])) {
                        $passwordHasher = new BlowfishPasswordHasher();
                        $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']
                        );
                    }
                return true;
        }
}

