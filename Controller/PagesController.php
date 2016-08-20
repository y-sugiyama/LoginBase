<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */
App::uses('AppController', 'Controller');
App::uses('BaseAuthorize', 'Controller/Component/Auth');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     *   or MissingViewException in debug mode.
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    public function beforeRender() {
        parent::beforeRender();
        //このアクションではfront.ctpのレイアウトを使います
        $this->layout = 'front';
    }

    public function display() {
        $path = func_get_args();


        //パスの数を数える (スラッシュで区切られた)
        $count = count($path);
        if (!$count) {
            //何も書かれてなければrootに飛ぶ
            return $this->redirect('/');
        }
        //変数の初期化
        $page = $subpage = $title_for_layout = null;

        //pathの1個めに文字列が入っていたら
        if (!empty($path[0])) {
            //その文字列を代入する  aaa
            $page = $path[0];
        }
        // pathの2個めに文字列が入っていたら 例:bbb
        if (!empty($path[1])) {
            
            //その文字列を変数subpageに代入
            $subpage = $path[1];
        }
        //最後尾のpathが存在するなら
        if (!empty($path[$count - 1])) {
            // bbb
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        //$this->set(['page' => $page, 'subpage' => $subpage, 'title_for_layout' => $title_for_layout]);
        $this->set(compact('page', 'subpage', 'title_for_layout'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    public function top() {
        $this->set(['title' => $title]);
        $title = 'Loginbase Top';
    }
        
    

}
