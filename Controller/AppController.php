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
    'Auth' => Array(
                //ログイン後のリダイレクト先は/users/indexです
                'loginRedirect' => Array('controller'  => 'users', 'action' => 'index'),
                //ログアウト後のリダイレクト先は/users/loginです
                'logoutRedirect' => Array('controller' => 'users', 'action' => 'login'),
                //ログインページのパスは/users/loginです
                'loginAction' => Array('controller' => 'users', 'action' => 'login'),
        
        'authenticate' => array(
            'Form' => array(
                'passwordHasher' => 'Blowfish'
            )
        ),
//        'authorize' => array('Controller') 
    )
);

public function isAuthorized($user) {
    // Adminは全てのアクションにアクセスできる
    if (isset($user['role']) && $user['role'] === 'admin') {
        return true;
    }

    // デフォルトは拒否(auther)
    return false;
}
}
