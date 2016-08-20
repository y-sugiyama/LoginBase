<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'Flash',
        'Security' => array(
            'csrfExpires' => '+1 hour'
        ),
        'Auth' => Array(
            //ログイン後のリダイレクト先は/users/indexです
            'loginRedirect' => Array('controller' => 'users', 'action' => 'index'),
            //ログアウト後のリダイレクト先は/users/loginです
            'logoutRedirect' => Array('controller' => 'users', 'action' => 'login'),
            //ログインページのパスは/users/loginです
            'loginAction' => Array('controller' => 'users', 'action' => 'login'),
            //認証判定ハンドラの設定
            'authenticate' => array(
//                FormAuthenticate で、POST されたデータをもとに認証を行う
                'Form' => array(
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ],
                    'passwordHasher' => 'Blowfish'
                )
            ),
            //権限判定
          'authorize' => array('Controller')
        )
    );

    public function beforeFilter() {
        parent::beforeRender();
        //このアクションではadmin.ctpのレイアウトを使います
        $this->layout = 'admin';
        //ログインしているユーザのIDを変数login_userに代入します
        $this->set('login_user', $this->Auth->user());
        //ログインしているユーザのユーザ名を変数login_usernameに代入します
//        $this->set('login_username', $this->Auth->user('username'));
    }

}
