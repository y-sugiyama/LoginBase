<?php
App::uses('User', 'Model');

class CreateUsersTable extends CakeMigration {

    /**
     * Migration description
     *
     * @var string
     */
    public $description = 'create_users_table';

    /**
     * Actions to be performed
     *
     * @var array $migration
     */
    public $migration = array(
        'up' => array(
            'create_table' => array(
                'users' => array(
                    'id' => array(
                        'type' => 'integer',
                        'null' => false,
                        'default' => null,
                        'length' => 36,
                        'key' => 'primary',
                    ),
                    'username' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => null
                    ),
                    'password' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => null
                    ),
                    'role' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => null
                    ),
                ),
            ),
        ),
        'down' => array(
            'drop_table' => array(
                'users',
            )
        ),
    );

    /**
     * Before migration callback
     *
     * @param string $direction Direction of migration process (up or down)
     * @return bool Should process continue
     */
    public function before($direction) {
        return true;
    }

    /**
     * After migration callback
     *
     * @param string $direction Direction of migration process (up or down)
     * @return bool Should process continue
     */
    public function after($direction) {
        //もしupだったら
        if ($direction === 'up') {
            //新しくUserクラスのインスタンスをつくる 初期データをつくる
            $user = new User();
            //databaseの初期値の設定に基づいて､インスタンスを初期化する
            $user->create();
            //以下の値で上書きしてdatabaseに保存する
            $user->save([
                'username' => 'admin',
                'password' => 'admin',
                'role' => 'admin'
            ]);
        }
//         @return bool Should process continue
        return true;
    }

}
